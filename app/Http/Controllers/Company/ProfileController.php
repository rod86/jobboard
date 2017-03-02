<?php

namespace App\Http\Controllers\Company;

use \App\Http\Controllers\Controller;
use App\Models\CompanyIndustry;
use App\Models\CompanySize;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function getEditProfile()
    {
	    $user = Auth::user();

	    $companySizes = CompanySize::all();
	    $companyIndustries = CompanyIndustry::orderBy('title', 'asc')->get();
	    $countries = Country::orderBy('name', 'asc')->get();

        return view('company.profile.edit', [
        	'user' => $user,
	        'companySizes' => $companySizes,
	        'companyIndustries' => $companyIndustries,
	        'countries' => $countries
        ]);
    }

    public function postEditProfile(Request $request)
    {
	    $this->validate($request, [
			'name' => 'required',
			'logo' => 'mimes:jpeg,jpg,gif,png|max:1000',
			'company_industry' => 'required',
			'company_size' => 'required',
			'website' => 'url',
			'country' => 'required'
		]);

	    $user = Auth::user();

	    $logo = $request->file('logo');
	    if ($logo) {

		    if (!empty($user->logo)) {
			    $this->deleteLogo($user->logo);
		    }

		    $destinationPath = storage_path('app/public/companies');
		    $fileName = $logo->getClientOriginalName();
		    $logo->move($destinationPath, $fileName);
		    $user->logo = $fileName;
	    }

	    $user->name = $request->get('name');
	    $user->description = $request->get('description');
	    $user->company_industry_id = $request->get('company_industry');
	    $user->company_size_id = $request->get('company_size');
	    $user->website = $request->get('website');
	    $user->country_id = $request->get('country');
	    $user->update();

	    return redirect()->route('company.profile')
	                     ->with(['success' => 'Profile updated successfully.']);
    }

    public function deleteFile()
    {
	    $user = Auth::user();

	    if (!$user)
	    	abort(500);

	    $this->deleteLogo($user->logo);

	    $user->logo = null;
	    $user->update();

	    return 'ok';
    }

    protected function deleteLogo($filename)
    {
	    $logoPath = storage_path('app/public/companies') .'/'. $filename;
	    File::delete($logoPath);
    }
}
