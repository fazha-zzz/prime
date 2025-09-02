
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span class="text-primary">
                  <img src="{{ asset('icon/assalam.jpg') }}" alt="logo" class="logo-img" style="padding: 10px 0;max-width: 150px;">
                </span>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
            </a>
          </div>
          <div class="menu-divider mt-0"></div>

          <div class="menu-inner-shadow"></div>

           <ul class="menu-inner py-1">
           <li class="menu-item">
              <a href="" class="menu-link">
                <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
              </a>
              </li>
               <li class="menu-item">
              <a href="{{ route('backend.pembayaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">pembayaran</div>
              </a>
            </li>
             <li class="menu-item">
              <a href="{{ route('backend.penggumuman.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">penggumuman</div>
              </a>
            </li>
          </ul>
        </aside>