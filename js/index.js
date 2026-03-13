const navbar = document.getElementById("mainNav");
const navLinks = document.querySelectorAll(".portfolio-navbar .nav-link");
const sections = document.querySelectorAll("main section[id]");
const reveals = document.querySelectorAll(".reveal");
const counters = document.querySelectorAll("[data-target]");
const contactForm = document.getElementById("contactForm");
const formMessage = document.getElementById("formMessage");
const year = document.getElementById("year");

function unlockBodyScrollIfNeeded() {
	const hasOpenOverlay = document.querySelector(".modal.show, .offcanvas.show");

	if (hasOpenOverlay) {
		return;
	}

	document.body.classList.remove("modal-open");
	document.body.style.removeProperty("overflow");
	document.body.style.removeProperty("padding-right");
}

if (year) {
	year.textContent = new Date().getFullYear();
}

if (typeof Swiper !== "undefined") {
	new Swiper(".hero-swiper", {
		loop: true,
		speed: 800,
		autoplay: {
			delay: 2600,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".hero-swiper .swiper-pagination",
			clickable: true,
		},
	});
}

function handleNavbarOnScroll() {
	if (!navbar) {
		return;
	}

	if (window.scrollY > 20) {
		navbar.classList.add("scrolled");
	} else {
		navbar.classList.remove("scrolled");
	}
}

function updateActiveNavLink() {
	const currentPosition = window.scrollY + 140;

	sections.forEach((section) => {
		const sectionTop = section.offsetTop;
		const sectionHeight = section.offsetHeight;
		const sectionId = section.getAttribute("id");

		if (currentPosition >= sectionTop && currentPosition < sectionTop + sectionHeight) {
			navLinks.forEach((link) => {
				const href = link.getAttribute("href") || "";
				const hash = href.includes("#") ? href.slice(href.indexOf("#")) : href;
				link.classList.toggle("active", hash === `#${sectionId}`);
			});
		}
	});
}

const revealObserver = new IntersectionObserver(
	(entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add("show");
				observer.unobserve(entry.target);
			}
		});
	},
	{
		threshold: 0.15,
	}
);

reveals.forEach((item) => revealObserver.observe(item));

const counterObserver = new IntersectionObserver(
	(entries, observer) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) {
				return;
			}

			const element = entry.target;
			const target = Number(element.getAttribute("data-target"));
			let value = 0;
			const increment = Math.max(1, Math.floor(target / 35));

			const timer = setInterval(() => {
				value += increment;
				if (value >= target) {
					value = target;
					clearInterval(timer);
				}
				element.textContent = `${value}+`;
			}, 28);

			observer.unobserve(element);
		});
	},
	{
		threshold: 0.4,
	}
);

counters.forEach((counter) => counterObserver.observe(counter));

if (contactForm && formMessage) {
	contactForm.addEventListener("submit", (event) => {
		event.preventDefault();
		formMessage.textContent = "Message sent successfully. I will get back to you soon.";
		formMessage.style.color = "#1f8a7a";
		contactForm.reset();
	});
}

window.addEventListener("scroll", () => {
	handleNavbarOnScroll();
	updateActiveNavLink();
});

window.addEventListener("load", unlockBodyScrollIfNeeded);
window.addEventListener("pageshow", unlockBodyScrollIfNeeded);

document.addEventListener("hidden.bs.modal", unlockBodyScrollIfNeeded);
document.addEventListener("hidden.bs.offcanvas", unlockBodyScrollIfNeeded);

handleNavbarOnScroll();
updateActiveNavLink();
unlockBodyScrollIfNeeded();


