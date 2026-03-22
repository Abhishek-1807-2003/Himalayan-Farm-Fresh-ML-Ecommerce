<?php include 'components/header.php'; ?>

<!-- Hero Section -->
<section class="contact-hero" style="background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover; height: 300px; display: flex; align-items: center; justify-content: center; color: white; text-align: center;">
    <div style="background: rgba(0,0,0,0.5); padding: 20px 40px; border-radius: 10px;">
        <h1 style="font-size: 3rem; margin: 0;">Contact Us</h1>
        <p style="margin: 10px 0 0;">We’d love to hear from you 🌱</p>
    </div>
</section>

<!-- Contact Form Section -->
<section style="padding: 60px 20px; background: #f9f9f9;">
    <div style="max-width: 1000px; margin: auto; display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">

        <!-- Contact Form -->
        <div style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <h2 style="color: #2e7d32; margin-bottom: 20px;">Get in Touch</h2>
            <form action="send_message.php" method="post">
                <label for="name" style="display:block; margin:10px 0 5px;">Your Name</label>
                <input type="text" id="name" name="name" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:8px;">

                <label for="email" style="display:block; margin:15px 0 5px;">Your Email</label>
                <input type="email" id="email" name="email" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:8px;">

                <label for="subject" style="display:block; margin:15px 0 5px;">Subject</label>
                <input type="text" id="subject" name="subject" style="width:100%; padding:12px; border:1px solid #ccc; border-radius:8px;">

                <label for="message" style="display:block; margin:15px 0 5px;">Message</label>
                <textarea id="message" name="message" rows="6" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:8px;"></textarea>

                <button type="submit" style="margin-top:20px; padding:12px 20px; width:100%; background:#2e7d32; color:#fff; border:none; border-radius:8px; font-size:1rem; cursor:pointer;">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div style="display:flex; flex-direction:column; justify-content:center;">
            <h2 style="color:#2e7d32;">Our Contact Details</h2>
            <p style="margin: 15px 0;">We are always happy to connect with farmers, customers, and partners who share our passion for fresh Himalayan produce. Reach out to us anytime!</p>
            <p><strong>📍 Address:</strong> Himalayan Farm Fresh, Shimla, Himachal Pradesh</p>
            <p><strong>📞 Phone:</strong> +91 98765 43210</p>
            <p><strong>📧 Email:</strong> contact@himalayanfarmfresh.com</p>
            
            <div style="margin-top:20px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.2385!2d77.1734!3d31.1048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390578f37f!2sShimla%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1692479999999" 
                        width="100%" height="250" style="border:0; border-radius:10px;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<?php include 'components/footer.php'; ?>
