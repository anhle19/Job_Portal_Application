<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Dashboard"><i class="fas fa-hand-point-right"></i>
                    <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page')||Request::is('admin/faq-page')||Request::is('admin/blog-page')||
            Request::is('admin/term-page')||Request::is('admin/contact-page')||Request::is('admin/job-categories-page')||Request::is('admin/contact-page')
            ||Request::is('admin/pricing-page')||Request::is('admin/other-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page
                        Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Home</a>
                    </li>
                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i> FAQs</a>
                    </li>
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_blog_page') }}"><i class="fas fa-angle-right"></i> Blog</a>
                    </li>
                    <li class="{{ Request::is('admin/job-categories-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_job_categories_page') }}"><i class="fas fa-angle-right"></i> Job Categories</a>
                    </li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_term_page') }}"><i class="fas fa-angle-right"></i> Terms of Use</a>
                    </li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                    </li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i> Contact</a>
                    </li>
                    <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_pricing_page') }}"><i class="fas fa-angle-right"></i> Pricing</a>
                    </li>
                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('admin_other_page') }}"><i class="fas fa-angle-right"></i> Others</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job
                        Section</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link {{ Request::is('admin/job-category/*') ? 'active' : '' }}"
                            href="{{ route('admin_job_category') }}"><i class="fas fa-angle-right"></i> Job Category</a>
                    </li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Job
                            Location</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/why-choose/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_why_choose') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Why Choose Items"><i class="fas fa-hand-point-right"></i>
                    <span>Why Choose Items</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Testimonials"><i class="fas fa-hand-point-right"></i>
                    <span>Testimonials</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/post/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Posts"><i class="fas fa-hand-point-right"></i>
                    <span>Post</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/faq/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="FAQ"><i class="fas fa-hand-point-right"></i>
                    <span>FAQ</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/package/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_package') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Package"><i class="fas fa-hand-point-right"></i>
                    <span>Package</span></a>
            </li>

        </ul>
    </aside>
</div>
