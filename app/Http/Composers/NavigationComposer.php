<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Link;

class NavigationComposer {

	public function composeMainMenu(View $view)
	{
		$view->with('menu_main', $this->menuMain());
	}

	public function composeCompanyMenu(View $view)
	{
		$view->with('menu_company_sidebar', $this->menuCompanySidebar());
	}

	private function menuMain()
	{
		$isLoggedCompany = Auth::guard('companies')->check();
		$username = ($isLoggedCompany) ? Auth::user()->name : null;

		$submenu = Menu::new()->addClass('dropdown-menu');
		$this->menuCompanyBase($submenu);

		$menu = Menu::new()
			->addClass('nav navbar-nav')
	        ->add(Link::toRoute('home', 'Find a job'))
			->submenuIf($isLoggedCompany,
				Link::to('#', $username . ' <span class="caret"></span>')
				    ->addClass('dropdown-toggle')
				    ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']),
					$this->submenuCompany()
				)
			->addIf(!$isLoggedCompany, Link::toRoute('company.login', 'Login'))
			->addIf(!$isLoggedCompany, Link::toRoute('company.register', 'Register'));

		return $menu;
	}

	private function submenuCompany()
	{
		$menu = Menu::new()
			->addClass('dropdown-menu');

		$this->menuCompanyBase($menu);

		$menu->html('', ['role' => 'separator', 'class' => 'divider'])
		     ->add(Link::toRoute('company.logout', 'Logout'));

		return $menu;
	}

	private function menuCompanySidebar()
	{
		$menu = Menu::new()
            ->addClass('nav nav-pills nav-stacked')
			->setActive(function (Link $link) {
				$currentPath = Route::getCurrentRoute()->getPath();
				return starts_with(url($currentPath), $link->url());
			});

		$this->menuCompanyBase($menu);

		return $menu;
	}

	private function menuCompanyBase(&$menu)
	{
		$menu->add(Link::toRoute('company.jobs.list', 'My Jobs'))
		     ->add(Link::toRoute('company.candidates', 'Candidates'))
		     ->add(Link::toRoute('company.profile', 'Profile'))
		     ->add(Link::toRoute('company.account', 'Account'));
	}
}