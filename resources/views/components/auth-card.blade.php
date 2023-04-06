 <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 login-bg">
    <h1 class="text-center text-xl font-semibold my-4 yvn-head-color">Global Handset Auction Platform</h1>
    <div class="rounded-t border border-solid border-slate-300" style="padding: 25px 346px; margin-bottom: -25px;">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-3xl mt-6 px-14 py-14 bg-transparent overflow-hidden rounded-b border border-solid border-slate-300">
        {{ $slot }}
    </div>
</div> 

{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 login-bg">
    <div class="login">
        <h1>Login</h1>
        <form method="post">
            <input class="yvn-input" type="text" name="u" placeholder="Email" required="required" />
            <input class="yvn-input" type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
</div> --}}