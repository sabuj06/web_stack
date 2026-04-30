<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | TrueNorth</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-header">
        <h1>TrueNorth Admin</h1>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}">Contacts</a>
            <a href="{{ route('admin.products') }}">Products</a>
            <a href="{{ route('admin.about') }}">About Section</a>
            <a href="{{ route('home') }}" target="_blank">View Site</a>
        </nav>
    </div>

    <div class="admin-body">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="stats">
            <div class="stat-card">
                <h3>{{ $contacts->total() }}</h3>
                <p>Total Inquiries</p>
            </div>
            <div class="stat-card">
                <h3>{{ $productsCount }}</h3>
                <p>Total Products</p>
            </div>
            <div class="stat-card">
                <h3>{{ $contacts->currentPage() }}</h3>
                <p>Current Page</p>
            </div>
        </div>

        <p class="section-title">Contact Inquiries</p>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone ?? '-' }}</td>
                    <td>{{ $contact->service ?? '-' }}</td>
                    <td>{{ Str::limit($contact->message, 50) }}</td>
                    <td>{{ $contact->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('admin.contacts.delete', $contact->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center; color:#999; padding:30px;">
                        No inquiries yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $contacts->links() }}</div>
    </div>
</body>
</html>