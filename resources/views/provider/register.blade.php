<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskify - Complete Your Profile</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/provider-setup.css">
</head>
<body>
    <div class="form-container">
        <div class="card">
            <div class="header">
                <h1 class="brand-title">Taskify</h1>
                <p class="brand-subtitle">Complete Your Profile</p>
            </div>
            
            <form id="profileForm" action="{{ route('save.provider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Profile Image -->
                <div class="mb-4">
                    <label class="form-label">Profile Image</label>
                    <div class="file-upload">
                        <input type="file" id="profileImage" name="profile_image" accept="image/*">
                        <label class="file-upload-label" for="profileImage">
                            <strong>Choose File</strong> <span id="profileFileName">No file chosen</span>
                        </label>
                    </div>
                @error('profile')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
                </div>
                
                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Enter your phone number">
                @error('contact')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
                </div>
                
                <!-- Category and Experience -->
                <div class="mb-4">
                        <label for="experience" class="form-label">Experience (years)</label>
                        <input type="number" class="form-control" name="experience" id="experience" placeholder="Years of experience" min="0">
                @error('experience')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
                </div>
                
                <!-- District and Price -->
                <div class="mb-4">
                        <label for="district" class="form-label">District</label>
                        <input type="text" class="form-control" name="district" id="district" placeholder="Enter your district">
                    @error('district')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                    @enderror
                </div>
                
                <!-- Hourly and Skills -->
                <div class="mb-4">
                        <label for="skills" class="form-label">Skills</label>
                        <input type="text" class="form-control" id="skills" name="skills" placeholder="E.g., Plumbing, Carpentry">
                    @error('skills')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                    @enderror
                </div>
                
                <!-- Full Address -->
                <div class="mb-4">
                    <label for="fullAddress" class="form-label">Full Address</label>
                    <input type="text" class="form-control" id="fullAddress" name="address" placeholder="Enter your full address">
                     @error('address')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                    @enderror
                </div>
                
                <!-- About Your Service -->
                <div class="mb-12">
                    <label for="bio" class="form-label">About</label>
                    <textarea class="form-control" id="bio" name="bio" placeholder="Share some details about yourself"></textarea>
                    @error('bio')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Save & Continue</button>
            </form>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // File upload feedback
        document.getElementById('profileImage').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'No file chosen';
            document.getElementById('profileFileName').textContent = fileName;
        });
        
        document.getElementById('portfolio').addEventListener('change', function(e) {
            const fileCount = e.target.files.length;
            const text = fileCount === 0 ? 'No file chosen' : 
                        fileCount === 1 ? e.target.files[0].name : 
                        `${fileCount} files selected`;
            document.getElementById('portfolioFileName').textContent = text;
        });
        
        // // Form submission
        // document.getElementById('profileForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     // Get form data
        //     const formData = {
        //         phoneNumber: document.getElementById('phoneNumber').value,
        //         category: document.getElementById('category').value,
        //         experience: document.getElementById('experience').value,
        //         district: document.getElementById('district').value,
        //         price: document.getElementById('price').value,
        //         hourly: document.getElementById('hourly').value,
        //         skills: document.getElementById('skills').value,
        //         fullAddress: document.getElementById('fullAddress').value,
        //         aboutService: document.getElementById('aboutService').value
        //     };
            
        //     console.log('Form submitted:', formData);
            
        //     // Show success message
        //     alert('Profile saved successfully!');
        // });
    </script>
</body>
</html>