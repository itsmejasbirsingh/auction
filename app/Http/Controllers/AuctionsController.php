<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionRequest;
use App\Models\Activation;
use App\Models\Auction;
use App\Models\Capacity;
use App\Models\Color;
use App\Models\DeviceType;
use App\Models\Extension;
use App\Models\Grade;
use App\Models\Manufacture;
use App\Models\Operator;
use App\Models\Product;
use App\Models\Sim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Bid;

class AuctionsController extends Controller
{
    /**
     * List of available live auctions.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $auctions = Auction::with([
            'sim',
            'activation',
            'grade',
            'manufacture',
            'product',
            'color',
            'capacity',
            'deviceType',
            'myBid'
        ])->where('closing_date', '>=', Carbon::now())->orderByDesc('id')->paginate(50);
        return view('dashboard', compact('auctions'));
    }

    /**
     * Show add a new auction form.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $manufactures = Manufacture::all();
        $capacities = Capacity::all();
        $activations = Activation::all();
        $device_types = DeviceType::all();
        $extensions = Extension::all();
        $grades = Grade::all();
        $operators = Operator::all();
        $sims = Sim::all();
        $products = Product::all();
        $colors = Color::all();
        return view(
            'auction-add',
            compact(
                'manufactures',
                'capacities',
                'activations',
                'device_types',
                'extensions',
                'grades',
                'operators',
                'sims',
                'products',
                'colors'
            )
        );
    }


    /**
     * Create a new auction.
     *
     */

    public function save(AuctionRequest $request)
    {
        try {
            $auction = new Auction();

            $auction->user_id = $request->user()->id;
            $auction->title = $request->input('title');
            $auction->description = $request->input('description');
            $auction->quantity = $request->input('quantity');
            $auction->manufacture_id = $request->input('manufacture_id');
            $auction->product_id = $request->input('product_id');
            $auction->device_type_id = $request->input('device_type_id');
            $auction->capacity_id = $request->input('capacity_id');
            $auction->activation_id = $request->input('activation_id');
            $auction->extension_id = $request->input('extension_id');
            $auction->grade_id = $request->input('grade_id');
            $auction->color_id = $request->input('color_id');
            $auction->operator_id = $request->input('operator_id');
            $auction->sim_id = $request->input('sim_id');
            $auction->closing_date = $request->input('closing_date');
            $auction->save();

            return redirect()->back()->with('status', 'Auction created!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function bid(Request $request)
    {
        try {

            $existedBid = Bid::where('user_id', $request->user()->id)->where('auction_id', $request->auction_id)->first();

            $usd = $request->usd;

            if (!$usd)
                $usd = 0;

            if ($existedBid) {
                $existedBid->update([
                    'usd' => $usd
                ]);
            } else {
                $bid = new Bid();
                $bid->user_id = $request->user()->id;
                $bid->auction_id = $request->auction_id;
                $bid->usd = $usd;
                $bid->save();
            }

            if ($request->ajax()) {
                $auction = Auction::find($request->auction_id);

                return Response::json([
                    'winning_status' => $auction->myWinningStatus(),
                    'my_bid' => $auction->myBid ? $auction->myBid->usd * $auction->quantity : '',
                    'auction_id' => $auction->id
                ], 200);
            }

            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->ajax())
                return Response::json([
                    'errors' => $e->getMessage()
                ], 400);

            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function show(Request $request)
    {
        try {
            $myBids = Bid::join('auctions', function ($join) {
                $join->on('bids.auction_id', '=', 'auctions.id');
            })->where('bids.user_id', $request->user()->id)->where('bids.usd', '>', 0)->select('usd', 'quantity')->get();

            if ($request->ajax())
                return Response::json([
                    'my_bids' => $myBids
                ], 200);
        } catch (\Exception $e) {
        }


    }
}