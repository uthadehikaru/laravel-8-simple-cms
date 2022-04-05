<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ConfigDataTable;
use App\Models\Config;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Storage;

class ConfigController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'key' => 'required|string|max:200', 
        'content' => 'required|string'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ConfigDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ConfigDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.config.create')]);
    }

    public function web()
    {
        $data['t'] = __('admin.config.index');
        $data['logo'] = getConfig('logo');
        $data['footer'] = getConfig('footer', true);
        $data['social'] = getConfig('socials', true);
        $data['about'] = getConfig('hero');
        $data['pages'] = Page::all();
        $data['footer_cols'] = ['desc','email','phone','address'];
        $data['social_cols'] = ['facebook_url','twitter_url','instagram_url'];
        return view('admin.forms.config-web', $data);
    }

    public function webUpdate(Request $request)
    {
        $data = $request->all();

        if($request->has('logo')){
            $image = $request->file('logo');
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).".png";
            $destinationPath = storage_path('app/public/uploads/logo');
            Storage::disk('uploads')->makeDirectory('logo');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/android-chrome-512x512.png');
            $imgFile->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
            $imgFile->resize(192, 192, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/android-chrome-192x192.png');
            $imgFile->resize(180, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/apple-touch-icon.png');
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/mstile-150x150.png');
            $imgFile->resize(32, 32, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/favicon-32x32.png');
            $imgFile->resize(16, 16, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/favicon-16x16.png');
            Config::where('key','logo')->update(['content'=>$filename]);
        }

        $footer = [
            'desc' => $data['desc'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ];
        Config::where('key','footer')->update(['content'=>json_encode($footer)]);
        
        $socials = [
            'facebook_url' => $data['facebook_url'],
            'twitter_url' => $data['twitter_url'],
            'instagram_url' => $data['instagram_url'],
        ];
        Config::where('key','socials')->update(['content'=>json_encode($socials)]);
        
        Config::where('key','hero')->update(['content'=>$data['about']]);

        Cache::flush();
        return back()->with('message','Updated succesfully');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.config', $this->formVariables('config', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Config::class, $request);
    }

    /**
     * @param \App\Models\Config $config
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Config $config)
    {
        return view('admin.show', ['object' => $config]);
    }

    /**
     * @param \App\Models\Config $config
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Config $config)
    {
        return view('admin.forms.config', $this->formVariables('config', $config));
    }

    /**
     * @param \App\Models\Config $config
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Config $config, Request $request)
    {
        return $this->saveFlashRedirect($config, $request);
    }

    /**
     * @param \App\Models\Config $config
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Config $config)
    {
        return $this->destroyFlashRedirect($config);
    }
}
