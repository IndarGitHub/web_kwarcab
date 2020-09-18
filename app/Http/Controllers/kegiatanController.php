<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekegiatanRequest;
use App\Http\Requests\UpdatekegiatanRequest;
use App\Repositories\kegiatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;
use File;
use Carbon\Carbon;
use Auth;

class kegiatanController extends AppBaseController
{
    /** @var  kegiatanRepository */
    private $kegiatanRepository;

    public function __construct(kegiatanRepository $kegiatanRepo)
    {
        $this->kegiatanRepository = $kegiatanRepo;
        $this->path = public_path('picture/kegiatan');
    }

    /**
     * Display a listing of the kegiatan.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $kegiatans = $this->kegiatanRepository->all();

        return view('kegiatans.index')
            ->with('kegiatans', $kegiatans);
    }

    /**
     * Show the form for creating a new kegiatan.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        $categories = \App\Models\Category::pluck('name','id');
        $users = \App\Models\User::where('id',Auth()->user()->id)->pluck('name','id');
        return view('kegiatans.create')->with(compact('categories', 'users'));
    }

    /**
     * Store a newly created kegiatan in storage.
     *
     * @param CreatekegiatanRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatekegiatanRequest $request)
    {
        // $input = $request->all();
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $file = $request->file('picture');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $fileName);
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $input['picture']=$fileName;
        $kegiatan = $this->kegiatanRepository->create($input);

        Alert::success('Kegiatan Berhasil Disimpan.');

        return redirect(route('kegiatans.index'));
    }

    /**
     * Display the specified kegiatan.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Alert::error('Kegiatan Tidak Ditemukan');

            return redirect(route('kegiatans.index'));
        }

        return view('kegiatans.show')->with('kegiatan', $kegiatan);
    }

    /**
     * Show the form for editing the specified kegiatan.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $categories = \App\Models\Category::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Alert::error('Kegiatan Tidak Ditemukan');

            return redirect(route('kegiatans.index'));
        }

        return view('kegiatans.edit')->with('kegiatan', $kegiatan)->with(compact('categories','users'));
    }

    /**
     * Update the specified kegiatan in storage.
     *
     * @param int $id
     * @param UpdatekegiatanRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatekegiatanRequest $request)
    {
        $kegiatan = $this->kegiatanRepository->find($id);
        $input = $request->all();
        if ($request->file('picture')){
            $file = $request->file('picture');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $fileName);
            $image_path = public_path('picture/kegiatan/'.$kegiatan->picture);
            File::delete($image_path);
            $input['picture']=$fileName;
        }else{
            $input['picture']=$kegiatan->picture;
        }

        $kegiatan->category_id = $request->category_id;
        $kegiatan->user_id = $request->user_id;
        $kegiatan->judul_kegiatan = $request->judul_kegiatan;
        $kegiatan->status = $request->status;
        if($request->picture){
            $kegiatan->picture = $fileName;
        }
        $kegiatan->isi_kegiatan = $request->isi_kegiatan;
        $berita->save();

        if (empty($kegiatan)) {
            Alert::error('Kegiatan Tidak Ditemukan');

            return redirect(route('kegiatans.index'));
        }

        // $kegiatan = $this->kegiatanRepository->update($request->all(), $id);

        Alert::success('Kegiatan Berhasil Diupdate.');

        return redirect(route('kegiatans.index'));
    }

    /**
     * Remove the specified kegiatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Alert::error('Kegiatan Tidak Ditemukan');

            return redirect(route('kegiatans.index'));
        }

        $this->kegiatanRepository->delete($id);

        Alert::success('Kegiatan Berhasil Dihapus.');

        return redirect(route('kegiatans.index'));
    }
}
