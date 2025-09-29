
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <style>

        #image ,#croppedImageData{
            max-width: 100%;
            display: block;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .cropper-container {
            max-width: 100%;
            margin: 0 auto;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin: 10px;
        }
        .file-input-container input[type="file"] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .file-input-label {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .file-input-label:hover {
            background-color: #218838;
        }
    </style>

        <div class="file-input-container">
            <label class="file-input-label" for="imageInput">Choose Image</label>
            <input type="file" id="imageInput" accept="image/*">
        </div>
        <div>
            <img id="image" style="max-height: 70%;">
        </div>
        <div>
            <img id="croppedImage" style="max-width:300px;max-height: 100%; margin-top: 20px; display: none;">
        </div>
        <button type="button" class="button" id="cropButton">Crop & Upload</button>
        <input type="hidden" id="croppedImageData" name="croppedImage">

    <script>
        let cropper;
        document.getElementById('imageInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('image').src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(document.getElementById('image'), {
                        aspectRatio: 13 / 9,
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('cropButton').addEventListener('click', function () {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas();
                    
                    // Create a new canvas for resizing
                    const resizedCanvas = document.createElement('canvas');
                    const maxWidth = 650; // Set the desired width
                    const maxHeight = 450; // Set the desired height
                    
                    // Set the dimensions of the resized canvas
                    resizedCanvas.width = maxWidth;
                    resizedCanvas.height = maxHeight;
                    
                    const ctx = resizedCanvas.getContext('2d');
                    
                    // Draw the cropped image on the resized canvas
                    ctx.drawImage(canvas, 0, 0, maxWidth, maxHeight);
                    
                    // Compress the image quality
                    const compressedBase64Image = resizedCanvas.toDataURL('image/jpeg', 0.7); // 0.7 is the quality from 0 to 1
    
                    // Display the cropped and resized image
                    const croppedImageElement = document.getElementById('croppedImage');
                    croppedImageElement.src = compressedBase64Image;
                    croppedImageElement.style.display = 'block';
    
                    // Set the base64 image data to the hidden input field
                    document.getElementById('croppedImageData').value = compressedBase64Image;
                    
                    // Submit the form (optional, if you want to automatically submit after cropping)
                    // document.getElementById('uploadForm').submit();
            }
        });
    </script>

