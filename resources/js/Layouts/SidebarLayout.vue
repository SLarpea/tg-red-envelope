<template>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item" v-if="$page.props.sidemenu[0].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/dashboard')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/dashboard') }" href="/dashboard"
                    preserve-state>
                <i class="bi bi-grid"></i>
                <span>{{ $page.props.sidemenu[0].name }}</span>
                </Link>
            </li>

            <li class="nav-heading">Mine Management</li>

            <li class="nav-item" v-if="$page.props.sidemenu[1].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/groups')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/groups') }" href="/groups"
                    preserve-state>
                <i class="bi bi-diagram-3"></i>
                <span>{{ $page.props.sidemenu[1].name }}</span>
                </Link>
            </li>
            <li class="nav-item" v-if="$page.props.sidemenu[2].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/tg-users')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/tg-users') }" href="/tg-users"
                    preserve-state>
                <i class="bi bi-people"></i>
                <span>{{ $page.props.sidemenu[2].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[3].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/red-envelopes')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/red-envelopes') }"
                    href="/red-envelopes" preserve-state>
                <i class="bi bi-envelope"></i>
                <span>{{ $page.props.sidemenu[3].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[4].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/recharge')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/recharge') }" href="/recharge"
                    preserve-state>
                <i class="bi bi-wallet2"></i>
                <span>{{ $page.props.sidemenu[4].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[5].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/commissions')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/commissions') }" href="/commissions"
                    preserve-state>
                <i class="bi bi-folder-check"></i>
                <span>{{ $page.props.sidemenu[5].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[6].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/rewards')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/rewards') }" href="/rewards"
                    preserve-state>
                <i class="bi bi-trophy"></i>
                <span>{{ $page.props.sidemenu[6].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[7].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/withdraw')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/withdraw') }" href="/withdraw"
                    preserve-state>
                <i class="bi bi-box-arrow-up-left"></i>
                <span>{{ $page.props.sidemenu[7].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[8].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/reports')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/reports') }" href="/reports"
                    preserve-state>
                <i class="bi bi-chat-left-dots"></i>
                <span>{{ $page.props.sidemenu[8].name }}</span>
                </Link>
            </li>

            <li class="nav-heading">System</li>

            <li class="nav-item" v-if="$page.props.sidemenu[9].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/administrator')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/administrator') }"
                    href="/administrator" preserve-state>
                <i class="bi bi-person"></i>
                <span>{{ $page.props.sidemenu[9].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[10].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/roles')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/roles') }" href="/roles"
                    preserve-state>
                <i class="bi bi-file-earmark-person"></i>
                <span>{{ $page.props.sidemenu[10].name }}</span>
                </Link>
            </li>

            <li class="nav-item" v-if="$page.props.sidemenu[11].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/permissions')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/permissions') }" href="/permissions"
                    preserve-state>
                <i class="bi bi-person-vcard"></i>
                <span>{{ $page.props.sidemenu[11].name }}</span>
                </Link>
            </li>

            <li class="nav-item">
                <div class="glow" v-if="$page.url.startsWith('/menus')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/menus') }" href="/menus"
                    preserve-state>
                <i class="bi bi-list"></i>
                <span>Menu</span>
                </Link>
            </li>

            <li class="nav-heading">Logs</li>

            <li class="nav-item" v-if="$page.props.sidemenu[12].status == 1">
                <div class="glow" v-if="$page.url.startsWith('/operation-log')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/operation-log') }"
                    href="/operation-log" preserve-state>
                <i class="bi bi-activity"></i>
                <span>{{ $page.props.sidemenu[12].name }}</span>
                </Link>
            </li>

        </ul>
    </aside>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    props: {
        sidemenu : Object,
    },
    // mounted() {
    //     let x = sessionStorage.getItem('load');
    //     (x) ? x = true : x = false;
    //     AOS.init({
    //         disable: x,
    //     });
    //     sessionStorage.setItem('load', true);
    // }
}

</script>
