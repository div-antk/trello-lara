<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\User;
use Auth;
use App\Http\Requests\ListingRequest;
use App\Repositories\ListingRepositoryInterface;

class ListingController extends Controller
{
    protected $ListingRepository;

    public function __construct(
        ListingRepositoryInterface $listingRepository
    )
    {
        $this->middleware('auth');
        $this->ListingRepository = $listingRepository;
    }
    
    public function index()
    {
        $user_id = Auth::user()->id;
        $listings = $this->ListingRepository->getAll($user_id);

        return view('listings.index')->with('listings', $listings);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(ListingRequest $request)
    {
        $user_id = Auth::user()->id;
        $this->ListingRepository->createList($user_id, $request->all());

        return redirect(route('listings.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit')->with('listing', $listing);
    }

    public function update(ListingRequest $request, $listing)
    {
        $user_id = Auth::user()->id;
        $this->ListingRepository->updateList($user_id, $request->all());

        return redirect(route('listings.index'));
    }

    public function destroy($request)
    {
        $user_id = Auth::user()->id;
        $this->ListingRepository->deleteList($request);

        return redirect(route('listings.index'));
    }
}
