<template>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"
                v-if="$page.props.sidemenu[0].status == 1 && $page.props.user.permissions.includes('dashboard')"
                data-aos="fade-right" data-aos-delay="0">
                <div class="glow" v-if="$page.url.startsWith('/dashboard')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/dashboard') }" href="/dashboard"
                    preserve-state>
                <i class="bi bi-grid"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[0].name :
                    $page.props.sidemenu[0].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-heading" data-aos="fade-right" data-aos-delay="200"
            v-if="[
                'group_management',
                'user_management',
                'red_envelope_management',
                'recharge_record',
                'platform_commission_record',
                'reward_record',
                'withdrawal_record',
                'reports'
            ].some(permission => $page.props.user.permissions.includes(permission))">{{ $t('mine_management_module') }}</li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[1].status == 1 && $page.props.user.permissions.includes('group_management')"
                data-aos="fade-right" data-aos-delay="200">
                <div class="glow" v-if="$page.url.startsWith('/groups')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/groups') }" href="/groups"
                    preserve-state>
                <i class="bi bi-diagram-3"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[1].name :
                    $page.props.sidemenu[1].zh_CN_name }}</span>
                </Link>
            </li>
            <li class="nav-item"
                v-if="$page.props.sidemenu[2].status == 1 && $page.props.user.permissions.includes('user_management')"
                data-aos="fade-right" data-aos-delay="400">
                <div class="glow" v-if="$page.url.startsWith('/tg-users')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/tg-users') }" href="/tg-users"
                    preserve-state>
                <i class="bi bi-people"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[2].name :
                    $page.props.sidemenu[2].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[3].status == 1 && $page.props.user.permissions.includes('red_envelope_management')"
                data-aos="fade-right" data-aos-delay="600">
                <div class="glow" v-if="$page.url.startsWith('/red-envelopes')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/red-envelopes') }"
                    href="/red-envelopes" preserve-state>
                <i class="bi bi-envelope"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[3].name :
                    $page.props.sidemenu[3].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[4].status == 1 && $page.props.user.permissions.includes('recharge_record')"
                data-aos="fade-right" data-aos-delay="800">
                <div class="glow" v-if="$page.url.startsWith('/recharge')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/recharge') }" href="/recharge"
                    preserve-state>
                <i class="bi bi-wallet2"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[4].name :
                    $page.props.sidemenu[4].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[5].status == 1 && $page.props.user.permissions.includes('platform_commission_record')"
                data-aos="fade-right" data-aos-delay="1000">
                <div class="glow" v-if="$page.url.startsWith('/commissions')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/commissions') }" href="/commissions"
                    preserve-state>
                <i class="bi bi-folder-check"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[5].name :
                    $page.props.sidemenu[5].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[6].status == 1 && $page.props.user.permissions.includes('reward_record')"
                data-aos="fade-right" data-aos-delay="1200">
                <div class="glow" v-if="$page.url.startsWith('/rewards')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/rewards') }" href="/rewards"
                    preserve-state>
                <i class="bi bi-trophy"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[6].name :
                    $page.props.sidemenu[6].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[7].status == 1 && $page.props.user.permissions.includes('withdrawal_record')"
                data-aos="fade-right" data-aos-delay="1400">
                <div class="glow" v-if="$page.url.startsWith('/withdraw')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/withdraw') }" href="/withdraw"
                    preserve-state>
                <i class="bi bi-box-arrow-up-left"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[7].name :
                    $page.props.sidemenu[7].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[8].status == 1 && $page.props.user.permissions.includes('reports')"
                data-aos="fade-right" data-aos-delay="1600">
                <div class="glow" v-if="$page.url.startsWith('/reports')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/reports') }" href="/reports"
                    preserve-state>
                <i class="bi bi-graph-up-arrow"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[8].name :
                    $page.props.sidemenu[8].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-heading" data-aos="fade-right" data-aos-delay="1600" v-if="[
                'administrator',
                'role',
                'permissions',
                'menu'
            ].some(permission => $page.props.user.permissions.includes(permission))">{{ $t('system_module') }}</li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[9].status == 1 && $page.props.user.permissions.includes('administrator')"
                data-aos="fade-right" data-aos-delay="1800">
                <div class="glow" v-if="$page.url.startsWith('/administrator')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/administrator') }"
                    href="/administrator" preserve-state>
                <i class="bi bi-person"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[9].name :
                    $page.props.sidemenu[9].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[10].status == 1 && $page.props.user.permissions.includes('role')"
                data-aos="fade-right" data-aos-delay="2000">
                <div class="glow" v-if="$page.url.startsWith('/roles')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/roles') }" href="/roles"
                    preserve-state>
                <i class="bi bi-file-earmark-person"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[10].name :
                    $page.props.sidemenu[10].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[11].status == 1 && $page.props.user.permissions.includes('permissions')"
                data-aos="fade-right" data-aos-delay="2200">
                <div class="glow" v-if="$page.url.startsWith('/permissions')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/permissions') }" href="/permissions"
                    preserve-state>
                <i class="bi bi-person-vcard"></i>
                <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[11].name :
                    $page.props.sidemenu[11].zh_CN_name }}</span>
                </Link>
            </li>

            <li class="nav-item" data-aos="fade-right" data-aos-delay="2400"
                v-if="$page.props.user.permissions.includes('menu')">
                <div class="glow" v-if="$page.url.startsWith('/menus')">&nbsp;</div>
                <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/menus') }" href="/menus"
                    preserve-state>
                <i class="bi bi-list"></i>
                <span>{{ ($page.props.user.locale == 'en') ? 'Menu' : '菜单' }}</span>
                </Link>
            </li>

            <li class="nav-heading"
                v-if="$page.props.sidemenu[12].status == 1 && $page.props.user.permissions.includes('operation_log')"
                data-aos="fade-right" data-aos-delay="2400">{{ $t('activity_log_module') }}</li>

            <li class="nav-item"
                v-if="$page.props.sidemenu[12].status == 1 && $page.props.user.permissions.includes('operation_log')"
            data-aos="fade-right" data-aos-delay="2600">
            <div class="glow" v-if="$page.url.startsWith('/operation-log')">&nbsp;</div>
            <Link class="nav-link" :class="{ 'collapsed': !$page.url.startsWith('/operation-log') }"
                href="/operation-log" preserve-state>
            <i class="bi bi-activity"></i>
            <span>{{ ($page.props.user.locale == 'en') ? $page.props.sidemenu[12].name :
                $page.props.sidemenu[12].zh_CN_name }}</span>
            </Link>
        </li>

    </ul>
    <FooterLayout />
</aside></template>

<script>
import { Link } from '@inertiajs/vue3';
import FooterLayout from "./FooterLayout.vue";
import AOS from "aos";

export default {
    components: {
        Link, FooterLayout,
    },
    props: {
        sidemenu: Object,
    },
    mounted() {
        let x = sessionStorage.getItem('load');
        (x) ? x = true : x = false;
        AOS.init({
            disable: x,
        });
        sessionStorage.setItem('load', true);
    }
}

</script>
