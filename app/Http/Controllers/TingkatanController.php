<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTingkatanRequest;
use App\Http\Requests\UpdateTingkatanRequest;
use App\Repositories\TingkatanRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Response;

class TingkatanController extends AppBaseController
{
    /** @var  TingkatanRepository */
    private $tingkatanRepository;

    public function __construct(TingkatanRepository $tingkatanRepo)
    {
        $this->tingkatanRepository = $tingkatanRepo;
    }

    /**
     * Display a listing of the Tingkatan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tingkatans = $this->tingkatanRepository->all();

        return view('tingkatans.index')
            ->with('tingkatans', $tingkatans);
    }

    /**
     * Show the form for creating a new Tingkatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('tingkatans.create');
    }

    /**
     * Store a newly created Tingkatan in storage.
     *
     * @param CreateTingkatanRequest $request
     *
     * @return Response
     */
    public function store(CreateTingkatanRequest $request)
    {
        $input = $request->all();

        $tingkatan = $this->tingkatanRepository->create($input);

        Alert::success('Tingkatan Berhasil Disimpan.');

        return redirect(route('tingkatans.index'));
    }

    /**
     * Display the specified Tingkatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tingkatan = $this->tingkatanRepository->find($id);

        if (empty($tingkatan)) {
            Alert::error('Tingkatan Tidak Ditemukan');

            return redirect(route('tingkatans.index'));
        }

        return view('tingkatans.show')->with('tingkatan', $tingkatan);
    }

    /**
     * Show the form for editing the specified Tingkatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tingkatan = $this->tingkatanRepository->find($id);

        if (empty($tingkatan)) {
            Alert::error('Tingkatan Tidak Ditemukan');

            return redirect(route('tingkatans.index'));
        }

        return view('tingkatans.edit')->with('tingkatan', $tingkatan);
    }

    /**
     * Update the specified Tingkatan in storage.
     *
     * @param int $id
     * @param UpdateTingkatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTingkatanRequest $request)
    {
        $tingkatan = $this->tingkatanRepository->find($id);

        if (empty($tingkatan)) {
            Alert::error('Tingkatan Tidak Ditemukan');

            return redirect(route('tingkatans.index'));
        }

        $tingkatan = $this->tingkatanRepository->update($request->all(), $id);

        Alert::success('Tingkatan Berhasil Diupdate.');

        return redirect(route('tingkatans.index'));
    }

    /**
     * Remove the specified Tingkatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tingkatan = $this->tingkatanRepository->find($id);

        if (empty($tingkatan)) {
            Alert::error('Tingkatan Tidak Ditemukan');

            return redirect(route('tingkatans.index'));
        }

        $this->tingkatanRepository->delete($id);

        Alert::success('Tingkatan Berhasil Dihapus.');

        return redirect(route('tingkatans.index'));
    }
}
