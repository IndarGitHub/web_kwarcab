<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKtaRequest;
use App\Http\Requests\UpdateKtaRequest;
use App\Repositories\KtaRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Response;

class KtaController extends AppBaseController
{
    /** @var  KtaRepository */
    private $ktaRepository;

    public function __construct(KtaRepository $ktaRepo)
    {
        $this->ktaRepository = $ktaRepo;
    }

    /**
     * Display a listing of the Kta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ktas = $this->ktaRepository->all();

        return view('ktas.index')
            ->with('ktas', $ktas);
    }

    /**
     * Show the form for creating a new Kta.
     *
     * @return Response
     */
    public function create()
    {
        return view('ktas.create');
    }

    /**
     * Store a newly created Kta in storage.
     *
     * @param CreateKtaRequest $request
     *
     * @return Response
     */
    public function store(CreateKtaRequest $request)
    {
        $input = $request->all();

        $kta = $this->ktaRepository->create($input);

        Alert::success('Kta Berhasil Disimpan.');

        return redirect(route('ktas.index'));
    }

    /**
     * Display the specified Kta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kta = $this->ktaRepository->find($id);

        if (empty($kta)) {
            Alert::error('Kta Tidak Ditemukan');

            return redirect(route('ktas.index'));
        }

        return view('ktas.show')->with('kta', $kta);
    }

    /**
     * Show the form for editing the specified Kta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kta = $this->ktaRepository->find($id);

        if (empty($kta)) {
            Alert::error('Kta Tidak Ditemukan');

            return redirect(route('ktas.index'));
        }

        return view('ktas.edit')->with('kta', $kta);
    }

    /**
     * Update the specified Kta in storage.
     *
     * @param int $id
     * @param UpdateKtaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKtaRequest $request)
    {
        $kta = $this->ktaRepository->find($id);

        if (empty($kta)) {
            Alert::error('Kta Tidak Ditemukan');

            return redirect(route('ktas.index'));
        }

        $kta = $this->ktaRepository->update($request->all(), $id);

        Alert::success('Kta Berhasil Diupdate.');

        return redirect(route('ktas.index'));
    }

    /**
     * Remove the specified Kta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kta = $this->ktaRepository->find($id);

        if (empty($kta)) {
            Alert::error('Kta Tidak Ditemukan');

            return redirect(route('ktas.index'));
        }

        $this->ktaRepository->delete($id);

        Alert::success('Kta Berhasil Dihapus.');

        return redirect(route('ktas.index'));
    }
}
