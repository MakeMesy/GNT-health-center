


<section id="contact-form">

    <div class="contact-form-content">
    <div class="contact-site-icon">
        <img src="./assets/img/main/favicon.png" alt="">
    </div>
    <div class="contact-left-content">
        <div>
        <h2>
            Book Your Appointment Today
        </h2>
        </div>
        <div>
        <p>
            Take the first step toward better health and wellness. Schedule your session with our experts now!
        </p>
        </div>
        <div class="form-img">
        <img src="./assets/img/main/contact.jpg" alt="">
        </div>
    </div>
    </div>
    <div class="contact-form-main">
        <form action="./backend/form.php" method="post">
            <div class="form-group">
                <div class="name-form">
                    <label for="">Full Name Here</label>
                    <input type="text" placeholder="Full Name Here" name="name">
                    <i></i>
                </div>
                <div class="email-form">
                    <label for="">Email Address</label>
                    <input type="email" placeholder="Email Address" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="">Your Phone</label>
                <input type="text" placeholder="Phone Number or Whatsapp Number" name="number">
            </div>
            <div class="form-group">
                <label for="">Service</label>
                <select name="service_category" id="category">
                    <option value="" selected disabled>Select</option>
                    <option value="weight-loss">Weight Loss</option>
                    <option value="bridal">Bridal Care</option>
                    <option value="detox">Detox</option>
                    <option value="skin-care">Skin Care</option>
                    <option value="hair-care">Hair Care</option>
                    <option value="pain-relief">Pain Relief</option>
                    <option value="insomnia">Insomnia</option>
                    <option value="spine-care">Spine Care</option>
                    <option value="flower-medicine">Flower Medicine</option>
                    <option value="yoga">Yoga</option>
                </select>

            </div>
            <div class="form-group">

            <label for="">Leave A Message</label>
            <textarea name="message" id="">

            </textarea>
            </div>
            <div class="form-btn">
                <button type="submit">Book Now</button>
            </div>
        </form>
    </div>
</section>