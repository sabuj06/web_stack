<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | TrueNorth Admin</title>
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

    <a href="{{ route('admin.products') }}" class="back-link">← Back to Products</a>

    <div class="form-card">
        <h2>Add New Product</h2>

        <div id="ajax-message" style="display:none; padding:12px 16px; border-radius:6px; margin-bottom:16px;"></div>

        <form id="add-product-form">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                <span class="error-text" id="error-name"></span>
            </div>
            <div class="form-group">
                <label>Sub Title</label>
                <input type="text" name="sub_title" value="{{ old('sub_title') }}" required>
                <span class="error-text" id="error-sub_title"></span>
            </div>
            <div class="form-group">
                <label>Action Text</label>
                <input type="text" name="action_text" value="{{ old('action_text') }}" required>
                <span class="error-text" id="error-action_text"></span>
            </div>
            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" id="image-input" accept="image/*" style="display:none;">
                <div id="image-upload-box" style="border:2px dashed #ccc; border-radius:8px; padding:28px; text-align:center; cursor:pointer;">
                    <img id="image-preview" src="" alt="" style="display:none; max-height:160px; border-radius:6px; margin-bottom:10px;">
                    <div id="upload-placeholder">
                        <p style="margin:0; color:#888; font-size:14px;">Click to select an image</p>
                        <span style="font-size:12px; color:#bbb;">JPG, PNG, WEBP — max 2MB</span>
                    </div>
                </div>
                <span class="error-text" id="error-image"></span>
            </div>
            <div class="form-group">
                <label>Special Card</label>
                <div class="checkbox-group">
                    <input type="checkbox" name="is_special" value="1">
                    <span>Mark as special (gold highlighted card)</span>
                </div>
            </div>
            <button type="submit" class="btn-save" id="submit-btn">Add Product</button>
        </form>
    </div>

<script>
    // Image Preview
    const uploadBox   = document.getElementById('image-upload-box');
    const imageInput  = document.getElementById('image-input');
    const preview     = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');

    uploadBox.addEventListener('click', () => imageInput.click());

    imageInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
                uploadBox.style.borderColor = '#555';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // AJAX Submit
    document.getElementById('add-product-form').addEventListener('submit', function (e) {
        e.preventDefault();

        document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
        const msgBox = document.getElementById('ajax-message');
        msgBox.style.display = 'none';

        const btn = document.getElementById('submit-btn');
        btn.textContent = 'Saving...';
        btn.disabled = true;

        fetch('{{ route('admin.products.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: new FormData(this)
        })
        .then(res => res.json())
        .then(data => {
            btn.textContent = 'Add Product';
            btn.disabled = false;

            if (data.success) {
                msgBox.textContent = data.message || 'Product added successfully!';
                msgBox.style.cssText = 'display:block; padding:12px 16px; border-radius:6px; margin-bottom:16px; background:#d4edda; color:#155724; border:1px solid #c3e6cb;';
                document.getElementById('add-product-form').reset();
                preview.style.display = 'none';
                preview.src = '';
                placeholder.style.display = 'block';
                uploadBox.style.borderColor = '#ccc';

            } else if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    const el = document.getElementById('error-' + field);
                    if (el) el.textContent = data.errors[field][0];
                });
                msgBox.textContent = 'Please fix the errors above.';
                msgBox.style.cssText = 'display:block; padding:12px 16px; border-radius:6px; margin-bottom:16px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;';
            }
        })
        .catch(() => {
            btn.textContent = 'Add Product';
            btn.disabled = false;
            msgBox.textContent = 'Something went wrong. Please try again.';
            msgBox.style.cssText = 'display:block; padding:12px 16px; border-radius:6px; margin-bottom:16px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;';
        });
    });
</script>

</body>
</html>