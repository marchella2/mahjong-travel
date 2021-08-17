<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SweetAlert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.create', ['travel_packages' => $travel_packages ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        Gallery::create($data);
        alert()->success('Data berhasil disimpan', 'Sukses');
        return redirect()->route('gallery.index');
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
        $item = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit', ['item' => $item, 'travel_packages' => $travel_packages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = Gallery::findOrFail($id);

        $item->update($data);

        alert()->success('Data berhasil diubah', 'Edit');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }

    public function travel()
    {
        $items = Gallery::onlyTrashed()->get();
        return view('pages.admin.gallery.trash', ['items' => $items]);
    }

    public function restoretravel($id)
    {
        $travel = Gallery::onlyTrashed()->where('id', $id);
        $travel->restore();

        alert()->info('Data berhasil dipulihkan', 'Restore');
        return redirect()->route('gallery.index');
    }

    public function restore_alltravel()
    {
        $travel = Gallery::onlyTrashed();
        $travel->restore();

        alert()->info('Data berhasil dipulihkan', 'Restore');
        return redirect()->route('gallery.index');
    }

    public function deletetravel($id)
    {
        $travel = Gallery::onlyTrashed()->where('id', $id);
        $travel->forceDelete();

        alert()->error('Data berhasil dihapus', 'Delete');
        return redirect()->route('gallery.index');
    }

    public function delete_alltravel()
    {
        $travel = Gallery::onlyTrashed();
        $travel->forceDelete();

        alert()->error('Data berhasil dihapus', 'Delete');
        return redirect()->route('gallery.index');
    }
}
