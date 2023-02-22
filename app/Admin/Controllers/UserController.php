<?php

namespace App\Admin\Controllers;

use Illuminate\Http\JsonResponse;
use Slowlyo\SlowAdmin\Renderers\Page;
use Slowlyo\SlowAdmin\Renderers\Form;
use Slowlyo\SlowAdmin\Renderers\TableColumn;
use Slowlyo\SlowAdmin\Renderers\TextControl;
use Illuminate\Http\Resources\Json\JsonResource;
use Slowlyo\SlowAdmin\Controllers\AdminController;
use App\Services\UserService;

class UserController extends AdminController
{
	protected string $serviceName = UserService::class;

	protected string $queryPath = '/user/users';

	protected string $pageTitle = '用户';

	public function index(): JsonResponse|JsonResource
	{
		if ($this->actionOfGetData()) {
			return $this->response()->success($this->service->list());
		}

		return $this->response()->success($this->list());
	}

	public function list(): Page
	{
		$crud = $this->baseCRUD()
			->headerToolbar([
				$this->createButton(true),
				'bulkActions',
				amis('reload')->align('right'),
				amis('filter-toggler')->align('right'),
			])
			->filter($this->baseFilter()->body([
					TextControl::make()
						->name('username')
						->label('用户名')
						->size('md')
						->placeholder('搜索用户名'),
					TextControl::make()
						->name('phone')
						->label('手机号')
						->size('md')
						->placeholder('搜索手机号'),
					
			]))
			->columns([
				TableColumn::make()->name('username')->label('用户名'),
				// TableColumn::make()->name('password')->label('Password'),
				TableColumn::make()->name('gender')->label('性别'),
				TableColumn::make()->name('phone')->label('手机'),
				TableColumn::make()->name('nickname')->label('昵称'),
				TableColumn::make()->name('birthday')->label('生日'),
				// TableColumn::make()->name('signature')->label('Signature'),
				TableColumn::make()->name('email')->label('邮箱'),
				// TableColumn::make()->name('email_status')->label('EmailStatus'),
				// TableColumn::make()->name('name')->label('Name'),
				// TableColumn::make()->name('mc_id')->label('McId'),
				// TableColumn::make()->name('mc_id_status')->label('McIdStatus'),
				// TableColumn::make()->name('mc_id_name')->label('McIdName'),
				// TableColumn::make()->name('qq')->label('Qq'),
				// TableColumn::make()->name('qq_id')->label('QqId'),
				TableColumn::make()->name('last_ip')->label('最后登录ip'),
				TableColumn::make()->name('last_time')->label('最后登录时间'),
				TableColumn::make()->name('avatar')->label('头像'),
				// TableColumn::make()->name('mc_points')->label('McPoints'),
				// TableColumn::make()->name('balance')->label('Balance'),
				TableColumn::make()->name('created_at')->label('创建时间')->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label('更新时间')->type('datetime')->sortable(true),
				$this->rowActions(),
			]);

		return $this->baseList($crud);
	}

	public function form(): Form
	{
		return $this->baseForm()->body([
			TextControl::make()->name('username')->label('Username'),
			TextControl::make()->name('password')->label('Password'),
			TextControl::make()->name('gender')->label('Gender'),
			TextControl::make()->name('phone')->label('Phone'),
			TextControl::make()->name('nickname')->label('Nickname'),
			TextControl::make()->name('birthday')->label('Birthday'),
			TextControl::make()->name('signature')->label('Signature'),
			TextControl::make()->name('email')->label('Email'),
			TextControl::make()->name('email_status')->label('EmailStatus'),
			TextControl::make()->name('name')->label('Name'),
			TextControl::make()->name('mc_id')->label('McId'),
			TextControl::make()->name('mc_id_status')->label('McIdStatus'),
			TextControl::make()->name('mc_id_name')->label('McIdName'),
			TextControl::make()->name('qq')->label('Qq'),
			TextControl::make()->name('qq_id')->label('QqId'),
			TextControl::make()->name('last_ip')->label('LastIp'),
			TextControl::make()->name('last_time')->label('LastTime'),
			TextControl::make()->name('avatar')->label('Avatar'),
			TextControl::make()->name('mc_points')->label('McPoints'),
			TextControl::make()->name('balance')->label('Balance'),
		]);
	}

	public function detail($id): Form
	{
		return $this->baseDetail($id)->body([
			TextControl::make()->static(true)->name('id')->label('ID'),
			TextControl::make()->static(true)->name('username')->label('Username'),
			TextControl::make()->static(true)->name('password')->label('Password'),
			TextControl::make()->static(true)->name('gender')->label('Gender'),
			TextControl::make()->static(true)->name('phone')->label('Phone'),
			TextControl::make()->static(true)->name('nickname')->label('Nickname'),
			TextControl::make()->static(true)->name('birthday')->label('Birthday'),
			TextControl::make()->static(true)->name('signature')->label('Signature'),
			TextControl::make()->static(true)->name('email')->label('Email'),
			TextControl::make()->static(true)->name('email_status')->label('EmailStatus'),
			TextControl::make()->static(true)->name('name')->label('Name'),
			TextControl::make()->static(true)->name('mc_id')->label('McId'),
			TextControl::make()->static(true)->name('mc_id_status')->label('McIdStatus'),
			TextControl::make()->static(true)->name('mc_id_name')->label('McIdName'),
			TextControl::make()->static(true)->name('qq')->label('Qq'),
			TextControl::make()->static(true)->name('qq_id')->label('QqId'),
			TextControl::make()->static(true)->name('last_ip')->label('LastIp'),
			TextControl::make()->static(true)->name('last_time')->label('LastTime'),
			TextControl::make()->static(true)->name('avatar')->label('Avatar'),
			TextControl::make()->static(true)->name('mc_points')->label('McPoints'),
			TextControl::make()->static(true)->name('balance')->label('Balance'),
			TextControl::make()->static(true)->name('created_at')->label('创建时间'),
			TextControl::make()->static(true)->name('updated_at')->label('更新时间')
		]);
	}
}
