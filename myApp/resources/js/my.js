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