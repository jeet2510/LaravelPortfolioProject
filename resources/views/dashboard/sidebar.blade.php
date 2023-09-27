<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-white">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.route')}}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index')}}">
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dataOpration.index')}}">
                                Data operations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.ticket')}}">
                                Ticket Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stripe.list')}}">
                                List of Payment
                            </a>
                        </li>
                        <!-- Add more sidebar items as needed -->
                    </ul>
                </div>
            </nav>