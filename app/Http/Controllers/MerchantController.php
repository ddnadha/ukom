<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = Merchant::paginate();
        return view('merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $merchant = $request->user()->merchant ?? new Merchant();
        $merchant->name = $request->name;

        $request->user()->merchant()->save($merchant);

        return redirect()->to('dashboard')->with('success', 'Berhasil mendaftarkan merchant');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return redirect()->back()->with('Berhasil menghapus merchant');
    }

    public function activate(Merchant $merchant)
    {
        $merchant->status = 'active';
        $merchant->save();

        return redirect()->back()->with('Berhasil mengaktifkan merchant');
    }

    public function detivate(Merchant $merchant)
    {
        $merchant->status = 'deactive';
        $merchant->save();

        return redirect()->back()->with('Berhasil menonaktifkan merchant');
    }
}
