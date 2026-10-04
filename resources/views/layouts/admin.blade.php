<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard - SMK Negeri 4 Bogor')</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
           ROOT
        ========================================================= */

        :root {
            --admin-primary: #00346F;
            --admin-accent: #004A99;
            --admin-navy: #0B1C30;
            --admin-bg: #F5F8FD;
            --admin-card: #FFFFFF;
            --admin-border: #DCE5F2;
            --admin-muted: #737783;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;

            /* Tetap bisa scroll, tetapi scrollbar halaman disembunyikan */
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            width: 0;
            height: 0;
            display: none;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--admin-bg);
            color: var(--admin-navy);
        }


        /* =========================================================
           WRAPPER
        ========================================================= */

        .admin-wrapper {
            width: 100%;
            min-height: 100vh;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 250px;
            height: 100vh;

            background: var(--admin-primary);
            color: #ffffff;

            z-index: 1000;

            display: flex;
            flex-direction: column;

            overflow: hidden;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .admin-brand {
            flex-shrink: 0;

            padding: 24px 22px;

            border-bottom: 1px solid rgba(255,255,255,0.12);
        }

        .admin-brand-title {
            margin: 0;

            color: #ffffff;

            font-size: 1rem;
            font-weight: 800;
        }

        .admin-brand-subtitle {
            margin: 4px 0 0;

            color: rgba(255,255,255,0.65);

            font-size: 0.7rem;
        }


        /* =========================================================
           SIDEBAR MENU
        ========================================================= */

        .admin-sidebar-menu {
            flex: 1;
            min-height: 0;

            padding: 14px;

            overflow-y: auto;
            overflow-x: hidden;
        }

        .admin-sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .admin-sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .admin-sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
        }


        /* =========================================================
           MENU LABEL
        ========================================================= */

        .admin-menu-label {
            padding: 0 12px;

            margin-bottom: 8px;

            color: rgba(255,255,255,0.45);

            font-size: 0.65rem;
            font-weight: 700;

            letter-spacing: 0.8px;
            text-transform: uppercase;
        }


        /* =========================================================
           MENU ITEM
        ========================================================= */

        .admin-menu-item {
            display: flex;
            align-items: center;

            width: 100%;

            padding: 11px 12px;
            margin-bottom: 4px;

            border-radius: 8px;

            color: rgba(255,255,255,0.78);

            text-decoration: none;

            font-size: 0.82rem;
            font-weight: 500;

            transition: 0.2s ease;
        }

        .admin-menu-item i {
            width: 20px;

            margin-right: 12px;

            text-align: center;

            font-size: 1rem;
            flex-shrink: 0;
        }

        .admin-menu-item:hover {
            background: rgba(255,255,255,0.10);
            color: #ffffff;
        }

        .admin-menu-item.active {
            width: calc(100% - 16px);

            margin-left: 8px;

            background: #E8EEF6;

            color: var(--admin-primary);

            font-weight: 700;
        }


        /* =========================================================
           NOTIFICATION
        ========================================================= */

        .admin-notification-badge {
            margin-left: auto;

            min-width: 22px;
            height: 22px;

            padding: 0 6px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 999px;

            background: #E5EEFF;
            color: var(--admin-accent);

            font-size: 0.65rem;
            font-weight: 700;
        }

        .admin-notification-badge:empty {
            display: none;
        }


        /* =========================================================
           SIDEBAR BOTTOM
        ========================================================= */

        .admin-sidebar-bottom {
            flex-shrink: 0;

            width: 100%;

            padding: 18px 14px 22px;

            border-top: 1px solid rgba(255,255,255,0.12);

            background: var(--admin-primary);
        }

        .admin-logout {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 10px 12px;

            border: none;
            border-radius: 8px;

            background: transparent;

            color: #ff6b6b;

            font-family: inherit;
            font-size: 0.78rem;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .admin-logout:hover {
            background: rgba(255,255,255,0.08);
            color: #ff8585;
        }

        .admin-logout i {
            font-size: 1rem;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .admin-main {
            width: calc(100% - 250px);
            margin-left: 250px;
            min-height: 100vh;

            overflow-x: hidden;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .admin-topbar {
            width: 100%;
            min-height: 88px;

            padding: 0 32px;

            background: #ffffff;

            border-bottom: 1px solid var(--admin-border);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .admin-topbar-info {
            transform: translateY(4px);
        }

        .admin-topbar-title {
            margin: 0;

            color: var(--admin-navy);

            font-size: 1.15rem;
            font-weight: 700;
        }

        .admin-topbar-subtitle {
            margin: 3px 0 0;

            color: var(--admin-muted);

            font-size: 0.8rem;
        }


        /* =========================================================
           PROFILE
        ========================================================= */

        .admin-profile {
            flex-shrink: 0;

            display: flex;
            align-items: center;

            gap: 10px;

            min-width: 245px;

            padding: 6px 14px;

            background: #ffffff;

            border: 2px solid #DCE5F2;

            border-radius: 50px;
        }

        .admin-profile-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #E5EEFF;
            color: var(--admin-accent);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-profile-icon i {
            font-size: 1.1rem;
        }

        .admin-profile-name {
            color: var(--admin-navy);

            font-size: 0.95rem;
            font-weight: 700;

            line-height: 1.2;
        }

        .admin-profile-role {
            margin-top: 2px;

            color: #8EA0B8;

            font-size: 0.75rem;
            font-weight: 600;

            letter-spacing: 0.2px;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .admin-content {
            width: 100%;

            padding: 32px;

            overflow-x: hidden;
        }


        /* =========================================================
           PAGE HEADING
        ========================================================= */

        .admin-page-heading {
            margin-bottom: 28px;
        }

        .admin-page-heading h1 {
            margin: 0;

            color: var(--admin-navy);

            font-size: 1.55rem;
            font-weight: 800;
        }

        .admin-page-heading p {
            margin: 6px 0 0;

            color: var(--admin-muted);

            font-size: 0.82rem;
        }


        /* =========================================================
           STAT CARD
        ========================================================= */

        .admin-stat-card {
            height: 100%;

            padding: 20px;

            background: var(--admin-card);

            border: 1px solid var(--admin-border);
            border-radius: 12px;

            transition: 0.2s ease;
        }

        .admin-stat-card:hover {
            transform: translateY(-2px);

            box-shadow: 0 8px 20px rgba(0,52,111,0.08);
        }

        .admin-stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 16px;
        }

        .admin-stat-icon {
            width: 42px;
            height: 42px;

            border-radius: 9px;

            background: #E5EEFF;
            color: var(--admin-accent);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1.1rem;
        }

        .admin-stat-number {
            margin: 0;

            color: var(--admin-navy);

            font-size: 1.55rem;
            font-weight: 800;
        }

        .admin-stat-label {
            margin: 4px 0 0;

            color: var(--admin-muted);

            font-size: 0.72rem;
        }


        /* =========================================================
           ADMIN CARD
        ========================================================= */

        .admin-card {
            overflow: hidden;

            background: #ffffff;

            border: 1px solid var(--admin-border);
            border-radius: 12px;
        }

        .admin-card-header {
            padding: 18px 20px;

            border-bottom: 1px solid var(--admin-border);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }

        .admin-card-header h2 {
            margin: 0;

            color: var(--admin-navy);

            font-size: 0.95rem;
            font-weight: 700;
        }

        .admin-card-header a {
            color: var(--admin-accent);

            text-decoration: none;

            font-size: 0.72rem;
            font-weight: 600;
        }

        .admin-card-body {
            padding: 20px;
        }


        /* =========================================================
           QUICK ACTION
        ========================================================= */

        .admin-action {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 13px;

            color: var(--admin-navy);

            text-decoration: none;

            border: 1px solid var(--admin-border);
            border-radius: 9px;

            transition: 0.2s ease;
        }

        .admin-action:hover {
            color: var(--admin-accent);

            background: #F8F9FF;

            border-color: var(--admin-accent);

            transform: translateY(-2px);

            box-shadow: 0 8px 20px rgba(11,28,48,0.08);
        }

        .admin-action-icon {
            width: 36px;
            height: 36px;

            flex-shrink: 0;

            border-radius: 8px;

            background: #E5EEFF;
            color: var(--admin-accent);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-action-title {
            margin: 0;

            font-size: 0.76rem;
            font-weight: 700;
        }

        .admin-action-desc {
            margin: 2px 0 0;

            color: var(--admin-muted);

            font-size: 0.65rem;
        }


        /* =========================================================
           QUICK ACTION COLORS
        ========================================================= */

        .admin-action.action-blue .admin-action-icon {
            background: #E5EEFF;
            color: #2563EB;
        }

        .admin-action.action-purple .admin-action-icon {
            background: #EEE7FF;
            color: #8B5CF6;
        }

        .admin-action.action-orange .admin-action-icon {
            background: #FFF0C9;
            color: #D97706;
        }

        .admin-action.action-green .admin-action-icon {
            background: #DDF8ED;
            color: #059669;
        }


        /* =========================================================
           BERITA TABLE
        ========================================================= */

        .berita-count {
            margin: 4px 0 0;

            color: var(--admin-muted);

            font-size: 0.72rem;
        }

        .btn-tambah-berita {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            padding: 9px 16px;

            background: var(--admin-accent);
            color: #ffffff !important;

            border-radius: 8px;

            font-size: 0.78rem !important;
            font-weight: 600 !important;

            text-decoration: none;

            transition: background 0.2s ease;
        }

        .btn-tambah-berita:hover {
            background: var(--admin-primary);
            color: #ffffff !important;
        }

        .berita-table-wrapper {
            width: 100%;

            padding: 8px 20px 20px;

            overflow-x: auto;
        }

        .berita-table {
            width: 100%;

            border-collapse: collapse;
        }

        .berita-table thead th {
            padding: 12px;

            text-align: left;

            color: var(--admin-muted);

            font-size: 0.68rem;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            border-bottom: 1px solid var(--admin-border);
        }

        .berita-table tbody td {
            padding: 14px 12px;

            vertical-align: middle;

            font-size: 0.82rem;

            border-bottom: 1px solid var(--admin-border);
        }

        .berita-table tbody tr:last-child td {
            border-bottom: none;
        }

        .berita-table tbody tr:hover {
            background: #F8F9FF;
        }

        .berita-table .col-number {
            width: 50px;
        }

        .berita-table .col-category {
            width: 130px;
        }

        .berita-table .col-date {
            width: 140px;
        }

        .berita-table .col-action {
            width: 190px;
        }

        .berita-number {
            color: var(--admin-muted);
            font-weight: 600;
        }

        .berita-title {
            margin-bottom: 3px;

            color: var(--admin-navy);

            font-weight: 700;
        }

        .berita-excerpt {
            color: var(--admin-muted);

            font-size: 0.72rem;

            line-height: 1.5;
        }

        .berita-category {
            display: inline-block;

            padding: 4px 10px;

            background: #E5EEFF;
            color: var(--admin-accent);

            border-radius: 6px;

            font-size: 0.7rem;
            font-weight: 600;
        }

        .berita-date {
            color: var(--admin-muted);

            font-size: 0.78rem;

            white-space: nowrap;
        }

        .berita-actions {
            display: flex;
            align-items: center;

            gap: 8px;
        }

        .berita-actions form {
            margin: 0;
        }


        /* =========================================================
           ACTION BUTTON
        ========================================================= */

        .btn-action {
            display: inline-flex;
            align-items: center;

            gap: 5px;

            padding: 6px 12px;

            background: #ffffff;

            border: 1px solid var(--admin-border);
            border-radius: 6px;

            font-family: inherit;

            font-size: 0.72rem;
            font-weight: 600;

            text-decoration: none;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .btn-edit {
            color: var(--admin-accent);
        }

        .btn-edit:hover {
            background: var(--admin-accent);
            border-color: var(--admin-accent);

            color: #ffffff;
        }

        .btn-delete {
            color: #C0392B;
        }

        .btn-delete:hover {
            background: #C0392B;
            border-color: #C0392B;

            color: #ffffff;
        }


        /* =========================================================
           EMPTY BERITA
        ========================================================= */

        .berita-empty {
            padding: 48px 20px !important;

            text-align: center;

            color: var(--admin-muted);
        }

        .berita-empty i {
            display: block;

            margin-bottom: 8px;

            color: var(--admin-accent);

            font-size: 2rem;
        }

        .berita-empty strong {
            display: block;

            margin-bottom: 2px;

            color: var(--admin-navy);
        }

        .berita-empty span {
            font-size: 0.78rem;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-label-custom {
            display: block;

            margin-bottom: 6px;

            color: var(--admin-navy);

            font-size: 0.8rem;
            font-weight: 600;
        }

        .form-control-custom {
            width: 100%;

            padding: 10px 14px;

            background: #F8F9FF;

            border: 1px solid var(--admin-border);
            border-radius: 8px;

            color: var(--admin-navy);

            font-family: inherit;
            font-size: 0.85rem;
        }

        .form-control-custom:focus {
            outline: none;

            background: #ffffff;

            border-color: var(--admin-accent);
        }

        textarea.form-control-custom {
            resize: vertical;
        }

        .btn-send-message {
            margin-right: 8px;

            padding: 10px 22px;

            background: var(--admin-accent);
            color: #ffffff;

            border: none;
            border-radius: 8px;

            font-family: inherit;

            font-size: 0.85rem;
            font-weight: 600;

            cursor: pointer;
        }

        .btn-send-message:hover {
            background: var(--admin-primary);
        }


        /* =========================================================
           DASHBOARD
        ========================================================= */

        .dashboard-stat-card {
            position: relative;

            min-height: 165px;

            overflow: hidden;

            transition: 0.2s ease;
        }

        .dashboard-stat-card:hover {
            transform: translateY(-3px);

            box-shadow: 0 12px 28px rgba(11,28,48,0.09);
        }

        .dashboard-stat-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 10px;
        }

        .dashboard-stat-status {
            padding: 5px 9px;

            background: #F1F5FA;
            color: #7B8CA5;

            border-radius: 20px;

            font-size: 0.65rem;
            font-weight: 700;

            white-space: nowrap;
        }

        .dashboard-section-desc {
            margin: 4px 0 0;

            color: #8A96A8;

            font-size: 0.72rem;
        }


        /* =========================================================
           STAT COLORS
        ========================================================= */

        .dashboard-stat-card.stat-blue {
            background: linear-gradient(
                135deg,
                #FFFFFF 0%,
                #F4F8FF 100%
            );

            border-top: 4px solid #2563EB;
        }

        .dashboard-stat-card.stat-blue .admin-stat-icon {
            background: #E5EEFF;
            color: #2563EB;
        }

        .dashboard-stat-card.stat-blue .dashboard-stat-status {
            background: #E8F0FF;
            color: #2563EB;
        }


        .dashboard-stat-card.stat-purple {
            background: linear-gradient(
                135deg,
                #FFFFFF 0%,
                #F8F4FF 100%
            );

            border-top: 4px solid #8B5CF6;
        }

        .dashboard-stat-card.stat-purple .admin-stat-icon {
            background: #EEE7FF;
            color: #8B5CF6;
        }

        .dashboard-stat-card.stat-purple .dashboard-stat-status {
            background: #F1EAFF;
            color: #7C3AED;
        }


        .dashboard-stat-card.stat-orange {
            background: linear-gradient(
                135deg,
                #FFFFFF 0%,
                #FFF9ED 100%
            );

            border-top: 4px solid #F59E0B;
        }

        .dashboard-stat-card.stat-orange .admin-stat-icon {
            background: #FFF0C9;
            color: #D97706;
        }

        .dashboard-stat-card.stat-orange .dashboard-stat-status {
            background: #FFF4D8;
            color: #D97706;
        }


        .dashboard-stat-card.stat-green {
            background: linear-gradient(
                135deg,
                #FFFFFF 0%,
                #F0FCF7 100%
            );

            border-top: 4px solid #10B981;
        }

        .dashboard-stat-card.stat-green .admin-stat-icon {
            background: #DDF8ED;
            color: #059669;
        }

        .dashboard-stat-card.stat-green .dashboard-stat-status {
            background: #E5F9F1;
            color: #059669;
        }


        .dashboard-stat-card.stat-pink {
            background: linear-gradient(
                135deg,
                #FFFFFF 0%,
                #FFF3F8 100%
            );

            border-top: 4px solid #EC4899;
        }

        .dashboard-stat-card.stat-pink .admin-stat-icon {
            background: #FCE4F0;
            color: #DB2777;
        }

        .dashboard-stat-card.stat-pink .dashboard-stat-status {
            background: #FDEAF4;
            color: #DB2777;
        }


        /* =========================================================
           REALTIME
        ========================================================= */

        .dashboard-realtime-badge {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            padding: 5px 9px;

            background: #E8F8F1;
            color: #15966A;

            border-radius: 20px;

            font-size: 0.65rem;
            font-weight: 700;
        }

        .dashboard-realtime-badge span {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #15966A;
        }


        /* =========================================================
           EMPTY DASHBOARD
        ========================================================= */

        .dashboard-empty-state {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 14px 0;
        }

        .dashboard-empty-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #EEF3FA;
            color: #6682A5;
        }

        .dashboard-empty-icon i {
            font-size: 1rem;
        }

        .dashboard-empty-title {
            margin: 0;

            color: var(--admin-navy);

            font-size: 0.78rem;
            font-weight: 700;
        }

        .dashboard-empty-desc {
            margin: 3px 0 0;

            color: #8A96A8;

            font-size: 0.68rem;
        }


        /* =========================================================
           DELETE MODAL
        ========================================================= */

        .delete-modal-overlay {
            position: fixed;

            inset: 0;

            z-index: 99999;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;

            background: rgba(4,18,35,0.55);

            opacity: 0;
            visibility: hidden;
            pointer-events: none;

            transition:
                opacity 0.2s ease,
                visibility 0.2s ease;
        }

        .delete-modal-overlay.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .delete-modal {
            width: min(430px, 100%);

            padding: 30px;

            background: #ffffff;

            border-radius: 18px;

            text-align: center;

            box-shadow: 0 25px 70px rgba(0,0,0,0.25);

            transform: translateY(15px) scale(0.96);

            transition: transform 0.2s ease;
        }

        .delete-modal-overlay.show .delete-modal {
            transform: translateY(0) scale(1);
        }

        .delete-modal-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 18px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff1f2;
            color: #dc3545;

            font-size: 24px;
        }

        .delete-modal h3 {
            margin: 0 0 10px;

            color: #102a43;

            font-size: 22px;
            font-weight: 700;
        }

        .delete-modal p {
            max-width: 340px;

            margin: 0 auto 25px;

            color: #6c757d;

            font-size: 14px;
            line-height: 1.6;
        }

        .delete-modal-actions {
            display: flex;
            justify-content: center;

            gap: 10px;
        }

        .delete-modal-cancel,
        .delete-modal-confirm {
            padding: 11px 18px;

            border: 0;
            border-radius: 9px;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.15s ease;
        }

        .delete-modal-cancel {
            background: #eef2f6;
            color: #475569;
        }

        .delete-modal-confirm {
            background: #eef2f6;
            color: #475569;
        }

        .delete-modal-cancel:hover {
            background: #41464b;
            color: #ffffff;

            transform: translateY(-1px);
        }

        .delete-modal-confirm:hover {
            background: #dc3545;
            color: #ffffff;

            transform: translateY(-1px);
        }

        body.modal-open {
            overflow: hidden;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991px) {

            .admin-sidebar {
                width: 220px;
            }

            .admin-main {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            .admin-content {
                padding: 24px;
            }

            .admin-topbar {
                padding: 0 24px;
            }

        }


        @media (max-width: 767px) {

            .admin-sidebar {
                position: relative;

                width: 100%;
                height: auto;
                min-height: auto;
            }

            .admin-sidebar-menu {
                overflow: visible;
            }

            .admin-main {
                width: 100%;
                margin-left: 0;
            }

            .admin-topbar {
                min-height: 80px;

                padding: 16px 20px;

                align-items: flex-start;

                flex-direction: column;
            }

            .admin-profile {
                width: 100%;
                min-width: 0;
            }

            .admin-content {
                padding: 20px;
            }

            .berita-table-wrapper {
                overflow-x: auto;
            }

        }

    </style>

    @stack('styles')

</head>

<body>

<div class="admin-wrapper">


    {{-- =========================================================
         SIDEBAR
    ========================================================= --}}

    <aside class="admin-sidebar">


        {{-- BRAND --}}

        <div class="admin-brand">

            <p class="admin-brand-title">
                SMK NEGERI 4 BOGOR
            </p>

            <p class="admin-brand-subtitle">
                Admin Dashboard
            </p>

        </div>


        {{-- MENU --}}

        <div class="admin-sidebar-menu">


            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >

                <i class="bi bi-grid-1x2-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- KELOLA KONTEN --}}

            <div class="admin-menu-label mt-3">
                Kelola Konten
            </div>


            {{-- BERITA --}}

            <a
                href="{{ route('admin.berita.index') }}"
                class="admin-menu-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
            >

                <i class="bi bi-newspaper"></i>

                <span>
                    Berita
                </span>

            </a>


            {{-- GALERI --}}

            <a
                href="{{ route('admin.galeri.index') }}"
                class="admin-menu-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
            >

                <i class="bi bi-images"></i>

                <span>
                    Galeri
                </span>

            </a>


            {{-- PRODUK --}}

            <a
                href="{{ route('admin.produk.index') }}"
                class="admin-menu-item {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}"
            >

                <i class="bi bi-trophy-fill"></i>

                <span>
                    Produk & Karya Siswa
                </span>

            </a>

            {{-- PESAN --}}

            <div class="admin-menu-label mt-3">
    Pesan
</div>

<a
    href="{{ route('admin.pesan.index') }}"
    class="admin-menu-item {{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}"
>
    <i class="bi bi-envelope-fill"></i>
    <span>Pesan Masuk</span>

    @php
        $pesanBelumDibaca = \App\Models\Pesan::where(
            'is_read',
            false
        )->count();
    @endphp

    @if ($pesanBelumDibaca > 0)
        <span class="admin-notification-badge">
            {{ $pesanBelumDibaca }}
        </span>
    @endif
</a>


            {{-- WEBSITE --}}

            <div class="admin-menu-label mt-3">
                Website
            </div>


            <a
                href="{{ url('/') }}"
                target="_blank"
                class="admin-menu-item"
            >

                <i class="bi bi-globe2"></i>

                <span>
                    Lihat Website
                </span>

            </a>


        </div>


        {{-- =====================================================
             LOGOUT
        ====================================================== --}}

        <div class="admin-sidebar-bottom">

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="admin-logout"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>


    </aside>


    {{-- =========================================================
         MAIN
    ========================================================= --}}

    <div class="admin-main">


        {{-- =====================================================
             TOPBAR
        ====================================================== --}}

        <header class="admin-topbar">


            <div class="admin-topbar-info">

                <p class="admin-topbar-title">
                    @yield('page-title', 'Dashboard')
                </p>

                <p class="admin-topbar-subtitle">
                    Kelola konten website SMK Negeri 4 Bogor
                </p>

            </div>


            {{-- PROFILE --}}

            <div class="admin-profile">

                <div class="admin-profile-icon">

                    <i class="bi bi-person-fill"></i>

                </div>


                <div>

                    <div class="admin-profile-name">

                        {{ auth()->user()->name }}

                    </div>


                    <div class="admin-profile-role">

                        {{ strtoupper(auth()->user()->role ?? 'Admin Website') }}

                    </div>

                </div>

            </div>


        </header>


        {{-- =====================================================
             CONTENT
        ====================================================== --}}

        <main class="admin-content">

            @yield('content')

        </main>


    </div>

</div>


{{-- Bootstrap JS --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


@stack('scripts')

</body>
</html>