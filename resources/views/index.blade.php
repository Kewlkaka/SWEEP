<x-base>
    <div class="main">
        <div class="section1">
            <div class="section1__headingBtnContainer">
                <h1 class="section1__heading">Bridging <span class="yellowSpan">Academia</span> With <span
                        class="yellowSpan">Industry</span></h1>
                <a href="#learnMore" class="learnMoreBtn">Learn More</a>
                <a href="/signUp" class="gsBtn">Get Started</a>
            </div>
            <div class="section1__img-container">
                <img src="{{ asset('assets/img/handshake.jpg') }}" alt="">
            </div>
        </div>
    </div>

     <!-- This is seciton 2  -->
     <div class="section-2" id="learnMore">
            <div class="top">
                <div class="block">
                    <img src="{{ asset('assets/img/section-2-arrow.png') }}" alt="">
                    <p>At SWEEP, we're your catalyst for online success. Our mission: guiding businesses to their perfect online strategy. Join us in achieving excellence in the digital world!</p> 
                    <div class="stats">
                        <h1><span>100</span>+</h1>
                        <p>User Sign ups</p>
                    </div>
                </div>

                <div class="block">
                    <h1>Our Purpose</h1>
                    <p>SWEEP is your dedicated platform, seamlessly connecting academia with individuals and organizations. Crafting strategies aligned with your goals, we ensure clear results and unwavering transparency in every collaboration. Join SWEEP in empowering students, organizations, and communities for success.</p>
                    <div class="stats">
                        <h1><span>40</span>+</h1>
                        <p>Project Collaboration</p>
                    </div>
                </div>

                <div class="block">
                    <h1>Community Impact</h1>
                    <p>As we connect academia with industry, we envision a community empowered with knowledge, skills, and enriched collaboration. SWEEP aims to foster a dynamic environment where individuals and organizations thrive, creating a ripple effect of positive change. Join us in anticipating and realizing the lasting impact on the community.
                    </p>
                    <div class="stats">
                        <h1><span>50</span>+</h1>
                        <p>Connections Made</p>
                    </div>
                </div>
            </div>
    </div>
    <!-- This is the end of section-2 -->

    <!-- This is the start of section-3 -->
    <div class="maintestimonial">
        <h1>Testimonials</h1>
        <div class="testimonial-container">
            <div class="testimonial-inner">
                <div class="testimonial-card">
                    <p class="testimonial-author">Reyan Tariq</p>
                    <p class="testimonial-text">"Great platform, now I'm able to afford my expenses easily"</p>
                    <p class="testimonial-position">Student, SZABIST</p>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-author">Jane Smith</p>
                    <p class="testimonial-text">"I'm extremely satisfied with the quality of their work. Highly recommended!"</p>
                    <p class="testimonial-position">CTO, Y-Tech Solutions</p>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-author">Bilal Ali</p>
                    <p class="testimonial-text">"Outstanding platform! The talent exceeded our expectations and delivered on time."</p>
                    <p class="testimonial-position">Marketing Director, Meta Corp</p>
                </div>
                </div>
                <button class="arrow arrow-left" onclick="prevTestimonial()">&#10094;</button>
                <button class="arrow arrow-right" onclick="nextTestimonial()">&#10095;</button>

                <script src="{{ asset('assets/js/index.js') }}"></script>
        </div>
    </div>
</x-base>
