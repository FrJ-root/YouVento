<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouVento - Club Management for YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#FF6B00',
                    secondary: '#FF8800',
                    dark: '#1A1A1A',
                    darkgray: '#2D2D2D',
                    lightgray: '#B3B3B3'
                }
            }
        }
    }
    </script>
    <style>
    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            transform: translateX(-50px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .animate-fade-in {
        opacity: 0;
        animation: fadeIn 0.8s forwards;
    }

    .animate-slide-in {
        opacity: 0;
        animation: slideIn 0.8s forwards;
    }

    .animate-pulse-slow {
        animation: pulse 3s infinite;
    }

    .stagger-delay-1 {
        animation-delay: 0.2s;
    }

    .stagger-delay-2 {
        animation-delay: 0.4s;
    }

    .stagger-delay-3 {
        animation-delay: 0.6s;
    }

    .stagger-delay-4 {
        animation-delay: 0.8s;
    }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-dark text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-primary">You<span class="text-white">Vento</span></span>
                    </div>
                </div>
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="#" class="text-gray-300 hover:text-primary font-medium transition duration-300">Home</a>
                    <a href="#" class="text-gray-300 hover:text-primary font-medium transition duration-300">Clubs</a>
                    <a href="#" class="text-gray-300 hover:text-primary font-medium transition duration-300">Events</a>
                    <button onclick="location.href=('/login')" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md font-medium transition duration-300">
                        Sign In
                    </button>
                </div>
                <div class="flex items-center md:hidden">
                    <button class="text-gray-300 hover:text-white" onclick="toggleMobileMenu()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu, hidden by default -->
        <div id="mobile-menu" class="md:hidden hidden bg-darkgray">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 text-gray-300 hover:text-primary font-medium">Home</a>
                <a href="#" class="block px-3 py-2 text-gray-300 hover:text-primary font-medium">Clubs</a>
                <a href="#" class="block px-3 py-2 text-gray-300 hover:text-primary font-medium">Events</a>
                <button
                    class="mt-2 w-full bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md font-medium transition duration-300">Sign
                    In</button>
            </div>
        </div>
    </nav>

    <style>
        #hero {
            background-image: url('https://i.gifer.com/embedded/download/PGnz.gif');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <!-- Hero Section -->
    <div id="hero" class="bg-gradient-to-r from-dark to-darkgray text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-12">
                <!-- Left Text Section -->
                <div class="lg:w-1/2 animate-slide-in">
                    <h1 class="text-4xl font-extrabold sm:text-5xl mb-6">Manage YouCode Clubs & Events Effortlessly</h1>
                    <p class="text-lg text-gray-300 mb-8">YouVento helps administrators, club leaders, and students
                        organize, discover, and participate in YouCode's vibrant community activities.</p>
                    <div class="flex gap-4">
                        <button
                            class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-md font-medium transition duration-300 animate-pulse-slow">Create
                            a Club</button>
                        <button
                            class="border border-primary text-primary hover:bg-darkgray px-6 py-3 rounded-md font-medium transition duration-300">Browse
                            Events</button>
                    </div>
                </div>

                <!-- Right Image Section with Animation -->
                <div class="mt-12 lg:mt-0 lg:w-1/2 relative">
                    <div class="relative w-full h-72 overflow-hidden rounded-lg shadow-xl">
                        <img id="hero-image"
                            src="https://www.aiworldwide.com/wp-content/uploads/2023/02/ai-pcs-training.jpg"
                            alt="Club Image"
                            class="absolute inset-0 w-full h-full object-cover rounded-lg transition-opacity duration-1000 opacity-100">
                    </div>
                </div>

                <script>
                // Array of images
                const heroImages = [
                    "https://www.aiworldwide.com/wp-content/uploads/2023/02/ai-pcs-training.jpg",
                    "https://wallpapers.com/images/hd/coding-background-l9pvpgogyoukpp2k.jpg",
                    "https://knightfoundation.org/wp-content/uploads/2016/10/Unknown-1.jpeg?resize=768"
                ];

                let currentImageIndex = 0;
                const heroImageElement = document.getElementById("hero-image");

                function changeHeroImage() {
                    heroImageElement.style.opacity = "0"; // Start fade out

                    setTimeout(() => {
                        currentImageIndex = (currentImageIndex + 1) % heroImages.length; // Move to next image
                        heroImageElement.src = heroImages[currentImageIndex]; // Change source
                        heroImageElement.style.opacity = "1"; // Fade back in
                    }, 500); // Time for fade effect
                }

                // Change image every 3 seconds
                setInterval(changeHeroImage, 3000);
                </script>

            </div>
        </div>
    </div>


    <!-- Features Section -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl font-bold text-dark mb-4">Everything You Need to Manage Clubs</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">YouVento provides powerful tools for club creation,
                    event management, and member engagement.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2 animate-fade-in stagger-delay-1">
                    <div
                        class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-primary mb-4">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Club Management</h3>
                    <p class="text-gray-600">Create and manage clubs with detailed profiles, member management, and
                        activity tracking.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2 animate-fade-in stagger-delay-2">
                    <div
                        class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-primary mb-4">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Event Scheduling</h3>
                    <p class="text-gray-600">Plan and schedule events with room booking, attendee management, and
                        calendar integration.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-2 animate-fade-in stagger-delay-3">
                    <div
                        class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-primary mb-4">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Resource Allocation</h3>
                    <p class="text-gray-600">Manage and allocate resources, track budgets, and generate reports for club
                        activities.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clubs Preview Section -->
    <div class="bg-dark text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl font-bold mb-4">Discover YouCode Clubs</h2>
                <p class="text-lg text-gray-300 max-w-3xl mx-auto">Join diverse clubs that match your interests and
                    skills.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6" id="clubsContainer">
                <!-- Club cards will be generated by JavaScript -->
            </div>

            <div class="mt-10 text-center">
                <a href="#"
                    class="inline-flex items-center font-medium text-primary hover:text-secondary transition duration-300">
                    View all clubs
                    <svg class="ml-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl font-bold text-dark mb-4">Upcoming Events</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Don't miss these exciting club events happening soon
                    at YouCode.</p>
            </div>

            <div class="space-y-6" id="eventsContainer">
                <!-- Event cards will be generated by JavaScript -->
            </div>

            <div class="mt-10 text-center">
                <a href="#"
                    class="inline-flex items-center font-medium text-primary hover:text-secondary transition duration-300">
                    View all events
                    <svg class="ml-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-6 animate-fade-in">Ready to Enhance YouCode's Club Experience?
            </h2>
            <p class="text-xl text-orange-100 mb-8 max-w-3xl mx-auto animate-fade-in stagger-delay-1">Join YouVento
                today and be part of YouCode's vibrant community of clubs and events.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in stagger-delay-2">
                <button
                    class="bg-white text-primary hover:bg-gray-100 px-6 py-3 rounded-md font-medium transition duration-300">Get
                    Started</button>
                <button
                    class="border border-white text-white hover:bg-secondary px-6 py-3 rounded-md font-medium transition duration-300">Contact
                    Admin</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <span class="text-2xl font-bold text-white">You<span class="text-primary">Vento</span></span>
                    <p class="mt-4 text-gray-400">The ultimate platform for managing YouCode clubs and events.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Clubs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Events</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-primary transition duration-300">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">FAQs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Club
                                Guidelines</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Event
                                Planning</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400">support@youvento.edu</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400">+212 123 456 789</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 YouVento. All rights reserved. A YouCode project.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
    // Toggle mobile menu
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('animate-fade-in');
        } else {
            mobileMenu.classList.add('hidden');
        }
    }

    // Intersection Observer for scroll animations
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('.animate-fade-in, .animate-slide-in');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(el => {
            observer.observe(el);
        });

        // Generate club cards
        const clubsData = [{
                name: "Code Masters",
                category: "Technology",
                color: "orange",
                description: "Advanced programming challenges and competitions",
                members: 42,
                schedule: "Weekly meetings"
            },
            {
                name: "UI/UX Warriors",
                category: "Design",
                color: "purple",
                description: "Creating beautiful and functional designs",
                members: 28,
                schedule: "Bi-weekly meetings"
            },
            {
                name: "Neural Network",
                category: "AI & ML",
                color: "green",
                description: "Exploring artificial intelligence and machine learning",
                members: 35,
                schedule: "Weekly meetings"
            },
            {
                name: "Bot Builders",
                category: "Robotics",
                color: "red",
                description: "Building and programming robots for competitions",
                members: 22,
                schedule: "Weekly workshops"
            }
        ];

        const clubsContainer = document.getElementById('clubsContainer');

        clubsData.forEach((club, index) => {
            const colorClasses = {
                orange: "bg-orange-100 text-primary",
                purple: "bg-purple-100 text-purple-800",
                green: "bg-green-100 text-green-800",
                red: "bg-red-100 text-red-800"
            };

            const clubCard = document.createElement('div');
            clubCard.className =
                `bg-darkgray rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in`;
            clubCard.style.animationDelay = `${0.2 + index * 0.1}s`;

            clubCard.innerHTML = `
          <img src="/api/placeholder/300/150" alt="${club.name}" class="w-full h-40 object-cover"/>
          <div class="p-4">
            <span class="inline-block px-3 py-1 text-xs font-medium ${colorClasses[club.color]} rounded-full mb-2">${club.category}</span>
            <h3 class="text-lg font-bold text-white mb-1">${club.name}</h3>
            <p class="text-gray-400 text-sm mb-3">${club.description}</p>
            <div class="flex items-center text-sm text-gray-500">
              <span>${club.members} members</span>
              <span class="mx-2">•</span>
              <span>${club.schedule}</span>
            </div>
          </div>
        `;

            clubsContainer.appendChild(clubCard);
        });

        // Generate event cards
        const eventsData = [{
                title: "Hackathon: Build an AI Assistant",
                description: "Join Code Masters for a 24-hour hackathon where you'll build your own AI assistant using the latest technologies.",
                date: "FEB 25",
                year: "2025",
                time: "9:00 AM - 9:00 AM (24h)",
                location: "Lab 3, Building B",
                registered: 68,
                color: "primary"
            },
            {
                title: "Design Workshop: Mobile First Approach",
                description: "UI/UX Warriors presents a hands-on workshop about designing with a mobile-first approach for modern applications.",
                date: "FEB 28",
                year: "2025",
                time: "2:00 PM - 5:00 PM",
                location: "Design Studio, Building A",
                registered: 32,
                color: "purple-600"
            }
        ];

        const eventsContainer = document.getElementById('eventsContainer');

        eventsData.forEach((event, index) => {
            const eventCard = document.createElement('div');
            eventCard.className =
                `bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col md:flex-row gap-6 animate-fade-in`;
            eventCard.style.animationDelay = `${0.2 + index * 0.2}s`;

            eventCard.innerHTML = `
          <div class="md:w-1/4 flex-shrink-0">
            <div class="bg-${event.color} text-white rounded-lg p-4 text-center">
              <span class="block text-2xl font-bold">${event.date}</span>
              <span class="block text-sm">${event.year}</span>
            </div>
          </div>
          <div class="md:w-3/4">
            <h3 class="text-xl font-bold text-dark mb-2">${event.title}</h3>
            <p class="text-gray-600 mb-4">${event.description}</p>
            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-${event.color}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>${event.time}</span>
              </div>
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-${event.color}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>${event.location}</span>
              </div>
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-${event.color}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>${event.registered} registered</span>
              </div>
            </div>
          </div>
        `;

            eventsContainer.appendChild(eventCard);
        });
    });

    // Hover animation for buttons
    const buttons = document.querySelectorAll('button, a');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.classList.add('animate-pulse-slow');
        });
        button.addEventListener('mouseleave', function() {
            this.classList.remove('animate-pulse-slow');
        });
    });
    </script>
</body>

</html>