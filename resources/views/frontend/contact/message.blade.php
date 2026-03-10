<section class="tf-section tf-message"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-message">
                    <h2 class="heading">
                        Send Us a Message
                    </h2>
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="fx flex-wrap">
                            <fieldset class="name">
                                <input type="text" placeholder="Your Full Name" required name="name" class="name" id="name">
                            </fieldset>
                            <fieldset class="email">
                                <input type="email" placeholder="Email Address" required name="mail" class="mail" id="mail">
                            </fieldset>
                            <fieldset class="phone">
                                <input type="tel" placeholder="Phone Number" required name="number" class="number" id="number">
                            </fieldset>
                            <fieldset class="select-wrap" role="group">
                                <div class="select">
                                    <select name="subject" id="subject" required>
                                        <option value="">Select Subject</option>
                                        <option value="Product Inquiry">Product Inquiry</option>
                                        <option value="Where to Buy / Availability">Where to Buy / Availability</option>
                                        <option value="Baby Cereal / Porridge Questions">Baby Cereal / Porridge Questions</option>
                                        <option value="Baby Curry Mix / Savory Foods">Baby Curry Mix / Savory Foods</option>
                                        <option value="Nutritional Advice / Feeding Guide">Nutritional Advice / Feeding Guide</option>
                                        <option value="Order / Wholesale Inquiry">Order / Wholesale Inquiry</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="message">
                                <textarea placeholder="Your Message" rows="5" required name="messagewr2" class="messagewr2" id="messagewr2"></textarea>
                            </fieldset>
                            <div class="wrap-btn">
                                <button type="submit" class="fl-btn st-6"><span class="inner">Send Message</span></button>
                            </div>
                        </div>
                    </form>

                    <div id="form-message" style="margin-top:15px; display:none; text-align:center;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Disabled state for themed button */
    .fl-btn:disabled,
    .fl-btn[disabled] {
        opacity: 0.6;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Spinner inside the .inner span */
    .btn-loading .inner::after {
        content: '';
        display: inline-block;
        width: 14px;
        height: 14px;
        margin-left: 8px;
        border: 2px solid currentColor;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        vertical-align: middle;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    const messageDiv = document.getElementById('form-message');

    // Disable & show loading
    submitButton.disabled = true;
    submitButton.classList.add('btn-loading');
    submitButton.innerHTML = '<span class="inner">Sending...</span>';

    // Hide any previous message
    messageDiv.style.display = 'none';
    messageDiv.textContent = '';

    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        messageDiv.style.display = 'block';
        messageDiv.style.color = result.success ? 'green' : 'red';
        messageDiv.textContent = result.message || (result.success ? 'Success!' : 'Error occurred.');

        if (result.success) {
            form.reset();
        }

    } catch (error) {
        messageDiv.style.display = 'block';
        messageDiv.style.color = 'red';
        messageDiv.textContent = 'Network error. Please check your connection.';
    } finally {
        // Restore button
        submitButton.disabled = false;
        submitButton.classList.remove('btn-loading');
        submitButton.innerHTML = originalText;
    }
});
</script>