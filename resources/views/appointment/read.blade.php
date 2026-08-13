<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Records | Data Janji</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f6f9fc;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .header-left h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0a1e2f;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-left h1 i {
            color: #2a7faa;
        }

        .header-left .subtitle {
            color: #6b7a8f;
            font-size: 14px;
            margin-top: 4px;
        }

        .badge-count {
            display: inline-block;
            background: #eef2f6;
            color: #3b4a5e;
            font-size: 14px;
            font-weight: 600;
            padding: 4px 16px;
            border-radius: 30px;
            margin-left: 8px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            border-radius: 12px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: #0a1e2f;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #1a3045;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(10, 30, 47, 0.12);
        }

        .btn-success {
            background: #16a34a;
            color: #ffffff;
        }

        .btn-success:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.15);
        }

        .btn-danger {
            background: #dc2626;
            color: #ffffff;
        }

        .btn-danger:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.15);
        }

        .btn-outline {
            background: transparent;
            color: #6b7a8f;
            border: 2px solid #e2e8f0;
        }

        .btn-outline:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid #eef2f6;
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        .stat-card .stat-label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #6b7a8f;
        }

        .stat-card .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #0a1e2f;
            margin-top: 4px;
        }

        .stat-card .stat-icon {
            float: right;
            font-size: 24px;
            color: #2a7faa;
            opacity: 0.3;
        }

        /* Table Card */
        .table-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            border: 1px solid #eef2f6;
        }

        .table-toolbar {
            padding: 16px 24px;
            border-bottom: 1px solid #eef2f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: #fafcfe;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 8px 16px;
            transition: all 0.2s ease;
            flex: 1;
            max-width: 320px;
        }

        .search-box:focus-within {
            border-color: #2a7faa;
            box-shadow: 0 0 0 4px rgba(42, 127, 170, 0.08);
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 14px;
            font-family: inherit;
            color: #0a1e2f;
            width: 100%;
            background: transparent;
        }

        .search-box input::placeholder {
            color: #a0b3c9;
        }

        .search-box i {
            color: #a0b3c9;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background: #f8fafc;
            border-bottom: 2px solid #eef2f6;
        }

        thead th {
            padding: 14px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #6b7a8f;
            white-space: nowrap;
            cursor: pointer;
            user-select: none;
            transition: color 0.2s ease;
            position: relative;
        }

        thead th:hover {
            color: #0a1e2f;
        }

        thead th .sort-icon {
            display: inline-block;
            margin-left: 4px;
            opacity: 0.3;
            font-size: 10px;
        }

        thead th.active .sort-icon {
            opacity: 1;
            color: #2a7faa;
        }

        tbody tr {
            border-bottom: 1px solid #f1f4f8;
            transition: background 0.15s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fafcfe;
        }

        tbody td {
            padding: 14px 20px;
            color: #1a2e3f;
            vertical-align: middle;
            font-size: 13px;
        }

        tbody td .status-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.confirmed {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-badge.completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-badge.cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .cell-notes {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .cell-notes:hover {
            white-space: normal;
            overflow: visible;
            background: #ffffff;
            position: relative;
            z-index: 10;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #eef2f6;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            gap: 4px;
        }

        .action-btn.view {
            background: #eff6ff;
            color: #3b82f6;
        }

        .action-btn.view:hover {
            background: #dbeafe;
        }

        .action-btn.delete {
            background: #fef2f4;
            color: #e74c5e;
        }

        .action-btn.delete:hover {
            background: #fde5e8;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7a8f;
        }

        .empty-state .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            display: block;
            opacity: 0.4;
        }

        .empty-state p {
            font-size: 16px;
        }

        .empty-state .btn {
            margin-top: 16px;
        }

        /* Footer */
        .table-footer {
            padding: 16px 24px;
            border-top: 1px solid #eef2f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13px;
            color: #6b7a8f;
            background: #fafcfe;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px 12px;
            }

            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .header-actions {
                flex-wrap: wrap;
            }

            .header-actions .btn {
                flex: 1;
                justify-content: center;
                min-width: 120px;
            }

            .search-box {
                max-width: 100%;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            thead th,
            tbody td {
                padding: 10px 14px;
                font-size: 12px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }

            .action-btn {
                padding: 4px 10px;
                font-size: 10px;
            }

            .table-toolbar {
                flex-direction: column;
                align-items: stretch;
                padding: 12px 16px;
            }

            .table-footer {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 14px 16px;
            }

            .stat-card .stat-number {
                font-size: 22px;
            }
        }

        /* Scrollable table for small screens */
        @media (max-width: 600px) {
            .table-wrapper {
                margin: 0 -16px;
            }
        }

        /* Print styles */
        @media print {
            .header-actions,
            .search-box,
            .action-buttons {
                display: none !important;
            }
            .table-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-calendar-check"></i>
                    Appointment Records
                    <span class="badge-count">{{ $appointments->count() }}</span>
                </h1>
                <div class="subtitle">Manage and view all patient appointment requests</div>
            </div>
            <div class="header-actions">
                <a href="{{ route('appointment.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> New Appointment
                </a>
                <a href="{{ route('appointment.create') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Back to Form
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-calendar-day"></i></span>
                <div class="stat-label">Total Appointments</div>
                <div class="stat-number">{{ $appointments->count() }}</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-clock"></i></span>
                <div class="stat-label">Pending</div>
                <div class="stat-number">{{ $appointments->where('status', 'pending')->count() ?? $appointments->count() }}</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-check-circle"></i></span>
                <div class="stat-label">Confirmed</div>
                <div class="stat-number">{{ $appointments->where('status', 'confirmed')->count() ?? 0 }}</div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-user"></i></span>
                <div class="stat-label">Unique Patients</div>
                <div class="stat-number">{{ $appointments->pluck('email')->unique()->count() }}</div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-card">
            <!-- Toolbar -->
            <div class="table-toolbar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Search by name, email, or phone..."
                        onkeyup="filterTable()"
                    >
                </div>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <button class="btn btn-outline" style="padding:8px 16px; font-size:12px;" onclick="exportCSV()">
                        <i class="fas fa-file-csv"></i> Export CSV
                    </button>
                    <button class="btn btn-outline" style="padding:8px 16px; font-size:12px;" onclick="window.print()">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrapper">
                @if ($appointments->count() > 0)
                    <table id="appointmentTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">
                                    # <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(1)">
                                    Patient <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(2)">
                                    Contact <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(3)">
                                    Date <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(4)">
                                    Time <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(5)">
                                    Type <span class="sort-icon">⇅</span>
                                </th>
                                <th onclick="sortTable(6)">
                                    Status <span class="sort-icon">⇅</span>
                                </th>
                                <th>Notes</th>
                                <th style="text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td><strong>{{ $appointment->nama }}</strong></td>
                                    <td>
                                        <div style="font-size:12px;">
                                            <div><i class="fas fa-phone" style="color:#6b7a8f; width:16px;"></i> {{ $appointment->telepon }}</div>
                                            <div><i class="fas fa-envelope" style="color:#6b7a8f; width:16px;"></i> {{ $appointment->email }}</div>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->tanggal)->format('M d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->waktu)->format('h:i A') }}</td>
                                    <td>
                                        <span style="font-size:12px; background:#f1f4f8; padding:2px 10px; border-radius:12px;">
                                            {{ ucfirst(str_replace('_', ' ', $appointment->jenis_janji ?? 'General')) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge pending">
                                            {{ ucfirst($appointment->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($appointment->catatan)
                                            <span class="cell-notes" title="{{ $appointment->catatan }}">
                                                {{ Str::limit($appointment->catatan, 40) }}
                                            </span>
                                        @else
                                            <span style="color:#a0b3c9; font-size:12px;">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons" style="justify-content:center;">
                                            <button class="action-btn view" onclick="viewAppointment({{ $appointment->id }})">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <form action="{{ route('appointment.destroy', $appointment->id) }}"
                                                  method="POST"
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Delete this appointment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <span class="empty-icon">📋</span>
                        <p>No appointments have been submitted yet.</p>
                        <a href="{{ route('appointment.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Create First Appointment
                        </a>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="table-footer">
                <span>
                    Showing <strong>{{ $appointments->count() }}</strong> appointment(s)
                </span>
                <span>
                    <i class="fas fa-clock"></i> Last updated: {{ now()->format('M d, Y h:i A') }}
                </span>
            </div>
        </div>

    </div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===== SEARCH / FILTER =====
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('appointmentTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                let found = false;
                const cells = row.getElementsByTagName('td');
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(filter)) {
                        found = true;
                        break;
                    }
                }
                row.style.display = found ? '' : 'none';
            }
        }

        // ===== SORT TABLE =====
        let sortDirection = {};

        function sortTable(columnIndex) {
            const table = document.getElementById('appointmentTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = Array.from(tbody.getElementsByTagName('tr'));

            if (!sortDirection[columnIndex]) {
                sortDirection[columnIndex] = 'asc';
            } else {
                sortDirection[columnIndex] = sortDirection[columnIndex] === 'asc' ? 'desc' : 'asc';
            }

            const direction = sortDirection[columnIndex];

            rows.sort((a, b) => {
                const aText = a.getElementsByTagName('td')[columnIndex]?.textContent.trim() || '';
                const bText = b.getElementsByTagName('td')[columnIndex]?.textContent.trim() || '';

                // Try to parse as number
                const aNum = parseFloat(aText.replace(/[^0-9.-]/g, ''));
                const bNum = parseFloat(bText.replace(/[^0-9.-]/g, ''));

                if (!isNaN(aNum) && !isNaN(bNum)) {
                    return direction === 'asc' ? aNum - bNum : bNum - aNum;
                }

                return direction === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });

            // Re-append sorted rows
            rows.forEach(row => tbody.appendChild(row));

            // Update sort icons
            const headers = table.getElementsByTagName('th');
            for (let i = 0; i < headers.length; i++) {
                headers[i].classList.remove('active');
                const icon = headers[i].querySelector('.sort-icon');
                if (icon) {
                    icon.textContent = '⇅';
                }
            }
            if (headers[columnIndex]) {
                headers[columnIndex].classList.add('active');
                const icon = headers[columnIndex].querySelector('.sort-icon');
                if (icon) {
                    icon.textContent = direction === 'asc' ? '▲' : '▼';
                }
            }
        }

        // ===== VIEW APPOINTMENT DETAIL (modal/simple alert) =====
        function viewAppointment(id) {
            const table = document.getElementById('appointmentTable');
            const rows = table.getElementsByTagName('tr');
            let found = false;

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                if (cells.length > 0 && cells[0].textContent.trim() === String(id)) {
                    found = true;
                    const name = cells[1].textContent.trim();
                    const phone = cells[2].querySelector('div:first-child')?.textContent.trim() || 'N/A';
                    const email = cells[2].querySelector('div:last-child')?.textContent.trim() || 'N/A';
                    const date = cells[3].textContent.trim();
                    const time = cells[4].textContent.trim();
                    const type = cells[5].textContent.trim();
                    const status = cells[6].textContent.trim();
                    const notes = cells[7].textContent.trim() || 'No notes';

                    alert(
                        `📋 Appointment Details\n\n` +
                        `ID: ${id}\n` +
                        `Patient: ${name}\n` +
                        `Phone: ${phone}\n` +
                        `Email: ${email}\n` +
                        `Date: ${date}\n` +
                        `Time: ${time}\n` +
                        `Type: ${type}\n` +
                        `Status: ${status}\n` +
                        `Notes: ${notes}`
                    );
                    break;
                }
            }

            if (!found) {
                alert('Appointment not found.');
            }
        }

        // ===== EXPORT CSV =====
        function exportCSV() {
            const table = document.getElementById('appointmentTable');
            const rows = table.getElementsByTagName('tr');
            let csv = [];
            const headers = ['ID', 'Patient', 'Phone', 'Email', 'Date', 'Time', 'Type', 'Status', 'Notes'];

            // Header row
            csv.push(headers.join(','));

            // Data rows (skip hidden rows from search)
            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                if (row.style.display === 'none') continue;

                const cells = row.getElementsByTagName('td');
                if (cells.length === 0) continue;

                const rowData = [];
                // ID
                rowData.push(cells[0].textContent.trim());
                // Name
                rowData.push(cells[1].textContent.trim());
                // Phone (from contact cell)
                const phoneEl = cells[2].querySelector('div:first-child');
                const phone = phoneEl ? phoneEl.textContent.replace(/[^0-9+\-\s()]/g, '').trim() : '';
                rowData.push(phone);
                // Email (from contact cell)
                const emailEl = cells[2].querySelector('div:last-child');
                const email = emailEl ? emailEl.textContent.replace(/[^@\s.]/g, '').trim() : '';
                rowData.push(email);
                // Date
                rowData.push(cells[3].textContent.trim());
                // Time
                rowData.push(cells[4].textContent.trim());
                // Type
                rowData.push(cells[5].textContent.trim());
                // Status
                rowData.push(cells[6].textContent.trim());
                // Notes
                const notesEl = cells[7].querySelector('.cell-notes');
                rowData.push(notesEl ? notesEl.textContent.trim() : cells[7].textContent.trim());

                // Escape commas and quotes
                const escaped = rowData.map(cell => {
                    if (typeof cell === 'string' && (cell.includes(',') || cell.includes('"') || cell.includes(
                            '\n'))) {
                        return `"${cell.replace(/"/g, '""')}"`;
                    }
                    return cell;
                });
                csv.push(escaped.join(','));
            }

            // Create and download
            const csvContent = csv.join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            const date = new Date().toISOString().split('T')[0];
            link.setAttribute('download', `appointments_${date}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        }
    </script>

</body>
</html>