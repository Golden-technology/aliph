<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    @include('dashboard.layouts.head')

    <style>
        .content {
            margin-top: 4%
        }

        .input-group-append button {
            padding: 0 10px;
        }

        .our_solution_category {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .our_solution_category .solution_cards_box {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .solution_cards_box .solution_card {
            flex: 0 50%;
            background: #fff;
            box-shadow: 0 2px 4px 0 rgba(136, 144, 195, 0.2),
                0 5px 15px 0 rgba(37, 44, 97, 0.15);
            border-radius: 15px;
            margin: 8px;
            padding: 10px 15px;
            position: relative;
            z-index: 1;
            overflow: hidden;
            /* min-height: 265px; */
            transition: 0.7s;
        }

        .solution_cards_box .solution_card:hover {
            background: #309df0;
            color: #fff;
            transform: scale(1.1);
            z-index: 9;
        }

        .solution_cards_box .solution_card:hover::before {
            background: rgb(85 108 214 / 10%);
        }

        .solution_cards_box .solution_card:hover .solu_title h3,
        .solution_cards_box .solution_card:hover .solu_description p {
            color: #fff;
        }

        .solution_cards_box .solution_card:before {
            content: "";
            position: absolute;
            background: rgb(85 108 214 / 5%);
            width: 170px;
            height: 400px;
            z-index: -1;
            transform: rotate(42deg);
            right: -56px;
            top: -23px;
            border-radius: 35px;
        }

.solution_cards_box .solution_card:hover .solu_description button {
  background: #fff !important;
  color: #309df0;
}

.solution_card .so_top_icon {
}

.solution_card .solu_title h3 {
  color: #212121;
  font-size: 1.3rem;
  margin-top: 13px;
  margin-bottom: 13px;
}

.solution_card .solu_description p {
  font-size: 15px;
  margin-bottom: 15px;
}

.solution_card .solu_description button {
  border: 0;
  border-radius: 15px;
  background: linear-gradient(
    140deg,
    #42c3ca 0%,
    #42c3ca 50%,
    #42c3cac7 75%
  ) !important;
  color: #fff;
  font-weight: 500;
  font-size: 1rem;
  padding: 5px 16px;
}

.our_solution_content h1 {
  text-transform: capitalize;
  margin-bottom: 1rem;
  font-size: 2.5rem;
}
.our_solution_content p {
}

.hover_color_bubble {
  position: absolute;
  background: rgb(54 81 207 / 15%);
  width: 100rem;
  height: 100rem;
  left: 0;
  right: 0;
  z-index: -1;
  top: 16rem;
  border-radius: 50%;
  transform: rotate(-36deg);
  left: -18rem;
  transition: 0.7s;
}

.solution_cards_box .solution_card:hover .hover_color_bubble {
  top: 0rem;
}

.solution_cards_box .solution_card .so_top_icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: #fff;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.solution_cards_box .solution_card .so_top_icon img {
  width: 40px;
  height: 50px;
  object-fit: contain;
}

/*start media query*/
@media screen and (min-width: 320px) {
  .sol_card_top_3 {
    position: relative;
    top: 0;
  }

  .our_solution_category {
    width: 100%;
    margin: 0 auto;
  }

  .our_solution_category .solution_cards_box {
    flex: auto;
  }
}
@media only screen and (min-width: 768px) {
  .our_solution_category .solution_cards_box {
    flex: 1;
  }
}
@media only screen and (min-width: 1024px) {
  .sol_card_top_3 {
    position: relative;
    top: -3rem;
  }

}
    .app-sidebar__toggle .close-toggle {
        display: none !important
    }

    </style>
</head>

<body class="main-body app sidebar-mini sidenav-toggled">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    <!-- main-content -->
    <div class="main-content app-content">
        @include('dashboard.layouts.main-header')
        <!-- container -->
        <div class="content">
            <div class="container-fluid">
                <div class="our_solution_category">
                    <div class="solution_cards_box">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('dashboard.stores.index') }}">
                                    <div class="solution_card">
                                        <div class="hover_color_bubble"></div>
                                        <div class="so_top_icon">
                                            
                                        </div>
                                        <div class="solu_title">
                                            <h3>{{ translate('نظام الخازن') }}</h3>
                                        </div>
                                        <div class="solu_description">
                                            <a href="{{ route('dashboard.stores.index') }}">
                                                <button type="button" class="read_more_btn">{{ translate('دخول') }}
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('dashboard.stores.index') }}">
                                    <div class="solution_card">
                                        <div class="hover_color_bubble"></div>
                                        <div class="so_top_icon">
                                            
                                        </div>
                                        <div class="solu_title">
                                            <h3>{{ translate('نظام الموظفين') }}</h3>
                                        </div>
                                        <div class="solu_description">
                                            <a href="{{ route('dashboard.hr.index') }}">
                                                <button type="button" class="read_more_btn">{{ translate('دخول') }}
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.footer-scripts')
            </div>
        </div>
</body>
</html>