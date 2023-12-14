<template>
    <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block">Hongbao Admin</span>
      </a>
      <i class="bi toggle-sidebar-btn"
                :class="(this.toggleShow == true) ? 'bi-text-indent-right' : 'bi-text-indent-left'" id="btn-toggle"
                @click.prevent="toggle"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img :src="$page.props.auth.user.profile_photo_url" alt="Profile" class="rounded-circle thumb-prof">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Array.from($page.props.auth.user.name)[0] + '. '
                    +
                    $page.props.auth.user.name.split(" ").splice(-1) }}</span>
            </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
                <form @submit.prevent="logout">
                    <button type="submit" class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    data() {
        return {
            isHiddenHelp: false,
            toggleShow: true,
        }
    },
    components: {
        Link,
    },
    methods: {
        logout() {
            this.$swal({
                text: "Are you sure you want to signout?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#38c172',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"> Yes',
                cancelButtonText: 'No&nbsp; <i class="bi bi-hand-thumbs-down">',
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.clear();
                    this.$inertia.post(route('logout'));
                }
            })

        },
        toggle() {
            const body = document.getElementById('body');
            body.classList.toggle('toggle-sidebar');
            this.toggleShow = !this.toggleShow;
        },
        escape(event) {
            if (event.keyCode === 27) {
                this.isHiddenHelp = false;
            }
        },
    },
    created() {
        window.addEventListener('keydown', this.escape);
    },
}

</script>
