<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SweetAlert;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::all();

        return view('pages.admin.travel-package.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TravelPackage::create($data);
        alert()->success('Data berhasil disimpan', 'Sukses');
        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TravelPackage::findOrFail($id);

        $item->update($data);

        alert()->success('Data berhasil diubah', 'Edit');
        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelPackage::findOrFail($id);
        $item->delete();

        return redirect()->route('travel-package.index');
    }

    public function travel()
    {
        $items = TravelPackage::onlyTrashed()->get();
        return view('pages.admin.travel-package.trash', ['items' => $items]);
    }

    public function restoretravel($id)
    {
        $travel = TravelPackage::onlyTrashed()->where('id', $id);
        $travel->restore();

        alert()->info('Data berhasil dipulihkan', 'Restore');
        return redirect()->route('travel-package.index');
    }

    public function restore_alltravel()
    {
        $travel = TravelPackage::onlyTrashed();
        $travel->restore();

        alert()->info('Data berhasil dipulihkan', 'Restore');
        return redirect()->route('travel-package.index');
    }

    public function deletetravel($id)
    {
        $travel = TravelPackage::onlyTrashed()->where('id', $id);
        $travel->forceDelete();

        alert()->error('Data berhasil dihapus', 'Delete');
        return redirect()->route('travel-package.index');
    }

    public function delete_alltravel()
    {
        $travel = TravelPackage::onlyTrashed();
        $travel->forceDelete();

        alert()->error('Data berhasil dihapus', 'Delete');
        return redirect()->route('travel-package.index');
    }
}
