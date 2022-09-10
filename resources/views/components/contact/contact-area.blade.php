<section class="contact-area padding-120">
        <div class="contact-shape-1"><img src="/assets/images/award-shape.png" alt="shape"></div>
        <div class="contact-shape-2"><img src="/assets/images/award-shape.png" alt="shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-left-content">
                        <span class="top-span">contact us</span>
                        <h2 class="title">don't hesitate to contact us if you need more help.</h2>
                        <div class="info-top">
                            <div class="info-envelope-icon">
                                <i class="fa fa-envelope-open"></i>
                            </div>
                            <div class="info-name">
                                <h4 class="title">contact us</h4>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div class="info-content">
                                <span>Phone : 123-456789</span>
                                <span>Email : yourmail@gmail.com</span>
                            </div>
                        </div>
                        <div class="info-top">
                            <div class="info-address-icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="info-name">
                                <h4 class="title">address</h4>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div class="info-content">
                                <span>London : 47-463 Broadway, L 100013</span>
                                <span>Canada : 12-463 Mainroad, C 209016</span>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                      </div>
                    @endif

                    <span class="top-span">write to us</span>
                    <!-- Contact Form Starts -->
                    <div class="contact-form">
                        <form action="{{route('contact')}}" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <select id="#" name="subject">
                                <option value="not selected">Select Subject</option>
                                <option value="Web">Web Development</option>
                                <option value="SEO">Search Engine Optimization</option>
                                <option value="SMM">Social Media Management</option>
                            </select>
                            <textarea name="message" placeholder="Your Message"></textarea>
                            <button type="submit" class="template-btn">submit now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>