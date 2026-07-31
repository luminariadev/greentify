<style>
    .conversation-logo {
        width: 40px;
        height: 40px;
        background-color: #3182ce;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .conversation-logo img {
        width: 70%;
        height: auto;
    }

    .contact-form {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        width: 80%;
        max-width: 400px;
    }

    .contact-form label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .contact-form textarea {
        resize: vertical;
    }

    .contact-form button {
        background-color: #3182ce;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .contact-form button:hover {
        background-color: #27649b;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var conversationLogo = document.querySelector('.conversation-logo');
        var contactForm = document.querySelector('.contact-form')

        // Toggle contact form display
        conversationLogo.addEventListener('click', function () {
            contactForm.style.display = contactForm.style.display === 'block' ? 'none' : 'block';
        });

        // Close contact form if user clicks outside of it
        document.addEventListener('click', function (event) {
            if (!contactForm.contains(event.target) && !conversationLogo.contains(event.target)) {
                contactForm.style.display = 'none';
            }
        });
    });
</script>
<footer class="fixed bottom-0 right-0 m-4">
    <div class="conversation-logo">
        <!-- Use your conversation icon or messaging icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15H9v-2h2v2zm0-4H9V7h2v6z" />
        </svg>
    </div>
</footer>

<!-- Contact Form -->
<div class="container mx-auto mt-10">
    <div class="contact-form max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-bold mb-4">Contact Us</h2>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-6">
                <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
                <textarea id="message" name="message" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send Message</button>
        </form>
    </div>
</div>
