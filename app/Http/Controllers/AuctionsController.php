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
use App\Models\AuctionColor;

class AuctionsController extends Controller
{
    /**
     * List of available live auctions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $runningAuctionsCount = Auction::where('closing_date', '>=', Carbon::now())->count();
        if(auth()->user()->is_admin)
            $biddings = Bid::join('auctions', function ($join) {
                $join->on('bids.auction_id', '=', 'auctions.id');
            })->where('closing_date', '>=', Carbon::now())->paginate(100);
        else
            $biddings = auth()->user()->myBiddings()->paginate(100);
        return view('dashboard')->with([
            'runningAuctionsCount' => $runningAuctionsCount,
            'participations' => auth()->user()->myBiddings->count(),
            'biddings' => $biddings
        ]);
    }


    public function auctions(Request $request)
    {
        $auctions = Auction::with([
            'sim',
            'activation',
            'grade',
            'manufacture',
            'product',
            'colors',
            'capacity',
            'deviceType',
            'myBid'
        ]);

        if ($request->input('sim')) {
            $auctions = $auctions->where('sim_id', $request->input('sim'));
        }

        if ($request->input('manufacture')) {
            $auctions = $auctions->where('manufacture_id', $request->input('manufacture'));
        }

        if ($request->input('capacity')) {
            $auctions = $auctions->where('capacity_id', $request->input('capacity'));
        }

        if ($request->input('activation')) {
            $auctions = $auctions->where('activation_id', $request->input('activation'));
        }

        if ($request->input('device_type')) {
            $auctions = $auctions->where('device_type_id', $request->input('device_type'));
        }

        if ($request->input('product')) {
            $auctions = $auctions->where('product_id', $request->input('product'));
        }

        if ($request->input('extension')) {
            $auctions = $auctions->where('extension_id', $request->input('extension'));
        }

        if ($request->input('grade')) {
            $auctions = $auctions->where('grade_id', $request->input('grade'));
        }

        $auctions = $auctions->where('closing_date', '>=', Carbon::now())->orderByDesc('auctions.id')->paginate(50);

        $filteredAuctions = $auctions;

        if ($request->input('color')) {
            $color_id = $request->input('color');

            $filteredAuctions = $auctions->filter(function ($auction) use ($color_id) {

                $colorExists = $auction->havingColor($color_id);

                if ($colorExists)
                    return $auction;
            });
        }

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
            'live-auctions',
            compact(
                'auctions',
                'filteredAuctions',
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
        if ($request->input('quantities') && count($request->input('quantities'))) {
            $quantities = [];

            foreach ($request->input('quantities') as $qty) {
                if ($qty) {
                    $quantities[] = $qty;
                }
            }
        }

        if ($request->input('quantities') && count($request->input('quantities'))) {
            $qtys = 0;
            foreach ($request->input('quantities') as $qty) {
                if ($qty)
                    $qtys += $qty;
            }
        }

        if (!$request->input('colors')) {
            return redirect()->back()->withErrors('Select at least one color!');
        }

        if (count($quantities) !== count($request->input('colors'))) {
            return redirect()->back()->withErrors('Colors & respected quantities mismatched!');
        }

        try {
            $auction = new Auction();

            $auction->user_id = $request->user()->id;
            $auction->title = $request->input('title');
            $auction->description = $request->input('description');
            $auction->quantity = $qtys;
            $auction->manufacture_id = $request->input('manufacture_id');
            $auction->product_id = $request->input('product_id');
            $auction->device_type_id = $request->input('device_type_id');
            $auction->capacity_id = $request->input('capacity_id');
            $auction->activation_id = $request->input('activation_id');
            $auction->extension_id = $request->input('extension_id');
            $auction->grade_id = $request->input('grade_id');
            $auction->operator_id = $request->input('operator_id');
            $auction->sim_id = $request->input('sim_id');
            $auction->closing_date = $request->input('closing_date');
            $auction->save();

            if ($request->input('colors') && count($request->input('colors'))) {

                foreach ($request->input('colors') as $index => $color) {
                    $auctionColor = new AuctionColor();
                    $auctionColor->auction_id = $auction->id;
                    $auctionColor->color_id = $color;
                    $auctionColor->quantity = $quantities[$index];
                    $auctionColor->save();
                }
            }

            return redirect()->back()->with('status', 'Auction created!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function makeBid($user_id, $auction_id, $usd, $updateInExisting = false)
    {
        $existedBid = Bid::where('user_id', $user_id)->where('auction_id', $auction_id)->first();

        if (!$usd)
            $usd = 0;

        if ($existedBid) {
            $existedBid->update([
                'usd' => $updateInExisting ? $usd + $existedBid->usd : $usd
            ]);
        } else {
            $bid = new Bid();
            $bid->user_id = $user_id;
            $bid->auction_id = $auction_id;
            $bid->usd = $usd;
            $bid->save();
        }
    }

    public function bid(Request $request)
    {
        try {
            if ($request->auction_ids && count($request->auction_ids) && $request->usd) {
                foreach ($request->auction_ids as $auction_id) {
                    $this->makeBid($request->user()->id, $auction_id, $request->usd, true);
                }

                return redirect()->back()->withStatus('Bid placed against selected auctions!');
            } elseif ($request->ajax()) {
                $this->makeBid($request->user()->id, $request->auction_id, $request->usd);
                $auction = Auction::find($request->auction_id);

                return Response::json([
                    'winning_status' => $auction->myWinningStatus(),
                    'my_bid' => $auction->myBid ? $auction->myBid->usd * $auction->quantity : '',
                    'auction_id' => $auction->id
                ], 200);
            }

            return redirect()->back()->withErrors('Select at least one auction from the list below!');
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

    public function biddings(Request $request, $auction_id)
    {
        $auction = Auction::findOrFail($auction_id);
        $biddings = Bid::with(['user'])->where('auction_id', $auction_id)->orderByDesc('usd')->paginate(100);

        $filteredBiddings = $biddings->filter(function ($bid) {
            if (!$bid->user->is_admin)
                return $bid;
        });

        return view('auction-biddings', compact('auction', 'filteredBiddings'));
    }

    public function extendClosingDate(Request $request, $auction_id){
        $auction = Auction::findOrFail($auction_id);
        $auction->closing_date = $request->closing_date_extension;
        $auction->save();
        return redirect()->back();
    }

    function csvToArray($csvFile): array
    {
        $header = null;
        $data = array();
        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function uploadCsv(Request $request)
    {
        try {
            $file = $request->file;

            if (!$file || !file_exists($file) || !is_readable($file))
                return redirect()->back()->withErrors('Unable to read file!');

            $fileArray = $this->csvToArray($file);

            // echo "<pre>";
            // print_r(json_encode($fileArray[0]['color-quantity']));
            // dd('exit');

            foreach ($fileArray as $arr) {

                // Manufacture.
                $found = Manufacture::where('title', $arr['manufacturer'])->first();
                if ($found) {
                    $manufactureId = $found->id;
                } else {
                    $ob = new Manufacture();
                    $ob->title = $arr['manufacturer'];
                    $ob->save();
                    $manufactureId = $ob->id;
                }

                // Product
                $found = Product::where('title', $arr['product'])->first();
                if ($found) {
                    $productId = $found->id;
                } else {
                    $ob = new Product();
                    $ob->title = $arr['product'];
                    $ob->save();
                    $productId = $ob->id;
                }

                // Sim
                $found = Sim::where('title', $arr['sim'])->first();
                if ($found) {
                    $simId = $found->id;
                } else {
                    $ob = new Sim();
                    $ob->title = $arr['sim'];
                    $ob->save();
                    $simId = $ob->id;
                }

                // // Grade
                // $found = Sim::where('title', $arr['grade'])->first();
                // if ($found) {
                //     $gradeId = $found->id;
                // } else {
                //     $ob = new Grade();
                //     $ob->title = $arr['grade'];
                //     $ob->save();
                //     $gradeId = $ob->id;
                // }

                // // Grade
                // $found = Sim::where('title', $arr['grade'])->first();
                // if ($found) {
                //     $gradeId = $found->id;
                // } else {
                //     $ob = new Grade();
                //     $ob->title = $arr['grade'];
                //     $ob->save();
                //     $gradeId = $ob->id;
                // }

                // Grade
                $found = Grade::where('title', $arr['grade'])->first();
                if ($found) {
                    $gradeId = $found->id;
                } else {
                    $ob = new Grade();
                    $ob->title = $arr['grade'];
                    $ob->save();
                    $gradeId = $ob->id;
                }

                // Activation
                $found = Activation::where('title', $arr['activation'])->first();
                if ($found) {
                    $activationId = $found->id;
                } else {
                    $ob = new Activation();
                    $ob->title = $arr['activation'];
                    $ob->save();
                    $activationId = $ob->id;
                }

                // Capacity
                $found = Capacity::where('title', $arr['capacity'])->first();
                if ($found) {
                    $capacityId = $found->id;
                } else {
                    $ob = new Capacity();
                    $ob->title = $arr['capacity'];
                    $ob->save();
                    $capacityId = $ob->id;
                }

                // Device type
                $found = DeviceType::where('title', $arr['device type'])->first();
                if ($found) {
                    $deviceTypeId = $found->id;
                } else {
                    $ob = new DeviceType();
                    $ob->title = $arr['device type'];
                    $ob->save();
                    $deviceTypeId = $ob->id;
                }

                // Operator
                $found = Operator::where('title', $arr['operator'])->first();
                if ($found) {
                    $operatorId = $found->id;
                } else {
                    $ob = new Operator();
                    $ob->title = $arr['operator'];
                    $ob->save();
                    $operatorId = $ob->id;
                }

                // Extension.
                $found = Extension::where('title', $arr['extension'])->first();
                if ($found) {
                    $extensionId = $found->id;
                } else {
                    $ob = new Extension();
                    $ob->title = $arr['extension'];
                    $ob->save();
                    $extensionId = $ob->id;
                }

                $auction = new Auction();

                $auction->user_id = $request->user()->id;
                $auction->title = $arr['title'];
                // $auction->description = $arr['description'];
                $auction->description = isset($arr['description']) ? $arr['description'] : "";
                $auction->closing_date = date("Y-m-d", strtotime($arr['closing date']));

                $auction->extension_id = $extensionId;
                $auction->manufacture_id = $manufactureId;
                $auction->product_id = $productId;
                $auction->sim_id = $simId;
                $auction->grade_id = $gradeId;
                $auction->activation_id = $activationId;
                $auction->capacity_id = $capacityId;
                $auction->device_type_id = $deviceTypeId;
                $auction->operator_id = $operatorId;
                $auction->quantity = 0;

                $auction->save();

                $colorQuantity = explode(",", $arr['color-quantity']);

                $quantities = 0;

                foreach ($colorQuantity as $cq) {

                    $cqArr = explode(":", $cq);

                    $color = $cqArr[0];
                    $quantity = $cqArr[1];

                    $quantities += $quantity;

                    $ac = new AuctionColor();
                    $ac->auction_id = $auction->id;


                    // Color.
                    $found = Color::where('title', $color)->first();
                    if ($found) {
                        $colorId = $found->id;
                    } else {
                        $ob = new Color();
                        $ob->title = $color;
                        $ob->save();
                        $colorId = $ob->id;
                    }

                    $ac->color_id = $colorId;
                    $ac->quantity = $quantity;

                    $ac->save();
                }

                $auction->quantity = $quantities;

                $auction->save();


            }

            return redirect()->back()->withStatus('Auctions uploaded!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }
}