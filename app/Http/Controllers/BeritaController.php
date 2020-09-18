<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Repositories\BeritaRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use File;
use Response;
use Carbon\Carbon;
use Auth;

class BeritaController extends AppBaseController
{
    /** @var  BeritaRepository */
    private $beritaRepository;

    public function __construct(BeritaRepository $beritaRepo)
    {
        $this->beritaRepository = $beritaRepo;
        $this->path = public_path('picture/berita');
    }

    /**
     * Display a listing of the Berita.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $beritas = $this->beritaRepository->all();
        $beritas_user = \App\Models\Berita::where('user_id',auth()->user()->id)->get();

        return view('beritas.index')
            ->with('beritas', $beritas)
            ->with('beritas_user', $beritas_user)
            ;
    }

    /**
     * Show the form for creating a new Berita.
     *
     * @return Response
     */
    public function create()
    {
        $categories = \App\Models\Category::pluck('name','id');
        // $comments = \App\Models\Comment::pluck('komentar','id');
        $users = \App\Models\User::where('id',Auth()->user()->id)->pluck('name','id');
        return view('beritas.create')->with(compact('categories', 'users'));
    }

    /**
     * Store a newly created Berita in storage.
     *
     * @param CreateBeritaRequest $request
     *
     * @return Response
     */
    public function store(CreateBeritaRequest $request)
    {

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $file = $request->file('picture');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $fileName);
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $input['picture']=$fileName;
        $berita = $this->beritaRepository->create($input);

        // $berita_id = new \App\Models\Comment();
        // $berita_id->berita_id = $berita->id;
        // $berita_id->save();
        Alert::success('Berita Berhasil Disimpan');

        return redirect(route('beritas.index'));
    }

    public function status_berita($id, Request $request){
        $persetujuan_berita = $request->persetujuan_berita;
        $data = \DB::table('beritas')->where('id',$id)->first();
        $status_sekarang = $data->persetujuan_berita;

        $input = $request->all();

        if($status_sekarang == null) {
            \DB::table('beritas')->where('id',$id)->update([
                'persetujuan_berita' => $persetujuan_berita, 
            ]);
        }
        return redirect('beritas/persetujuan_berita');
    }

    /**
     * Display the specified Berita.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $berita = $this->beritaRepository->find($id);

        if (empty($berita)) {
            Alert::error('Berita Tidak Ditemukan');

            return redirect(route('beritas.index'));
        }

        return view('beritas.show')->with('berita', $berita);
    }

    /**
     * Show the form for editing the specified Berita.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = \App\Models\Category::pluck('name','id');
        $comments = \App\Models\Comment::pluck('komentar','id');
        $users = \App\Models\User::pluck('name','id');
        $berita = $this->beritaRepository->find($id);

        if (empty($berita)) {
            Alert::error('Berita Tidak Ditemukan');

            return redirect(route('beritas.index'));
        }

        return view('beritas.edit')->with('berita', $berita)->with(compact('categories'))->with(compact('comments'))->with(compact('users'));
    }

    /**
     * Update the specified Berita in storage.
     *
     * @param int $id
     * @param UpdateBeritaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeritaRequest $request)
    {
        $berita = $this->beritaRepository->find($id);
        $input = $request->all();
        if ($request->file('picture')){
            $file = $request->file('picture');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $fileName);
            $image_path = public_path('picture/'.$berita->picture);
            File::delete($image_path);
            $input['picture']=$fileName;
        }else{
            $input['picture']=$berita->picture;
        }

        $berita->category_id = $request->category_id;
        $berita->judul = $request->judul;
        $berita->user_id = $request->user_id;
        $berita->status = $request->status;
        $berita->persetujuan_berita = $request->persetujuan_berita;
        if($request->picture){
            $berita->picture = $fileName;
        }
        $berita->isi = $request->isi;
        $berita->save();
        // if (!File::isDirectory($this->path)) {
        //     File::makeDirectory($this->path);
        // }
        // $file = $request->file('picture');
        // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->move($this->path, $fileName);
        // $input = $request->all();
        // $input['user_id']=Auth::user()->id;
        // $input['picture']=$fileName;
        // $berita = $this->beritaRepository->update($input, $id);

        Alert::success('Berita Berhasil Diupdate');

        return redirect(route('beritas.index'));
    }

    /**
     * Remove the specified Berita from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $berita = $this->beritaRepository->find($id);

        if (empty($berita)) {
            Alert::error('Berita Tidak Ditemukan');

            return redirect(route('beritas.index'));
        }

        $this->beritaRepository->delete($id);

        Alert::success('Berita Berhasil Dihapus');

        return redirect(route('beritas.index'));
    }
}
