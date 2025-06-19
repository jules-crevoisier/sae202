    <footer class="footer-modern mt-auto">
        <div class="main-container">
            <div class="footer-content">
                <!-- Logo et description -->
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="/assets/img/logo.svg" alt="Les Derniers Fils" />
                    </div>
                    <p class="footer-description">
                        Un événement mystérieux et immersif qui vous plongera dans une enquête palpitante. 
                        Découvrez qui est le coupable dans cette soirée inoubliable.
                    </p>
                    <div class="footer-follow">
                        <h6>Suivez-nous</h6>
                        <div class="footer-social">
                            <a href="#" class="social-link" aria-label="Facebook" title="Suivez-nous sur Facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram" title="Suivez-nous sur Instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube" title="Suivez-nous sur YouTube">
                                <i class="fab fa-youtube" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact -->
                <div class="footer-section">
                    <h5 class="footer-section-title">Contact</h5>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <span>+33 4 25 67 00 23</span>
                        </div>
                        <div class="contact-item">
                            <a href="mailto:lesderniersflls@contact.fr" class="footer-link">
                                lesderniersflls@contact.fr
                            </a>
                        </div>
                        <div class="contact-item">
                            <span>Mairie de Rosières</span>
                            <span>10700 Rosières-Saint-Sébastienne</span>
                        </div>
                    </div>
                    <div class="footer-newsletter">
                        <a href="/auth/inscription" class="btn-newsletter">S'inscrire à la Newsletter</a>
                    </div>
                </div>
                
                <!-- Liens Utiles -->
                <div class="footer-section">
                    <h5 class="footer-section-title">Liens Utiles</h5>
                    <ul class="footer-links">
                        <li><a href="/" class="footer-link">Accueil</a></li>
                        <li><a href="/concept" class="footer-link">Concept</a></li>
                        <li><a href="/infos" class="footer-link">Infos pratiques</a></li>
                        <li><a href="/auth/connexion" class="footer-link">Connexion</a></li>
                        <li><a href="/auth/inscription" class="footer-link">Inscription</a></li>
                    </ul>
                </div>
                
                <!-- Informations -->
                <div class="footer-section">
                    <h5 class="footer-section-title">Informations</h5>
                    <ul class="footer-links">
                        <li><a href="/mentions" class="footer-link">Mentions légales</a></li>
                        <li><a href="/politique-confidentialite" class="footer-link">Politique de Confidentialité</a></li>
                        <li><a href="/plan-du-site" class="footer-link">Plan du site</a></li>
                        <li><a href="/cookies" class="footer-link">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts personnalisés -->
    <script>
        // Animation au scroll pour révéler les éléments
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observer tous les éléments avec la classe animate-on-scroll
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
        
        // Auto-masquer les alertes après 5 secondes
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const closeBtn = alert.querySelector('.btn-close');
                if (closeBtn) {
                    closeBtn.click();
                }
            });
        }, 5000);
        
        // Smooth scroll pour les liens d'ancrage
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Amélioration de l'accessibilité - Focus visible
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                document.body.classList.add('keyboard-navigation');
            }
        });
        
        document.addEventListener('mousedown', function() {
            document.body.classList.remove('keyboard-navigation');
        });
    </script>
    
    <style>
        /* Footer moderne - Style exact de l'image */
        .footer-modern {
            background: #742939;
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }
        
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }
        
        /* Section Logo et description */
        .footer-brand {
            max-width: 400px;
        }
        
        .footer-logo {
            margin-bottom: 1.5rem;
        }
        
        .footer-logo img {
            height: 60px;
            width: auto;
            max-width: 200px;
            object-fit: contain;
        }
        
        .footer-logo svg,
        .footer-logo svg * {
            fill: white !important;
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }
        
        .footer-follow h6 {
            color: white;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        
        .footer-social {
            display: flex;
            gap: 0.75rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Sections du footer */
        .footer-section-title {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .footer-contact {
            margin-bottom: 2rem;
        }
        
        .contact-item {
            margin-bottom: 0.75rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            line-height: 1.4;
        }
        
        .contact-item span {
            display: block;
        }
        
        .footer-newsletter {
            margin-top: 1.5rem;
        }
        
        .btn-newsletter {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-newsletter:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Liens */
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            display: block;
            padding: 0.25rem 0;
        }
        
        .footer-link:hover {
            color: white;
            text-decoration: none;
            transform: translateX(3px);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
            
            .footer-brand {
                grid-column: 1 / -1;
                text-align: center;
                max-width: 100%;
                margin-bottom: 2rem;
            }
            
            .footer-social {
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .footer-modern {
                padding: 2rem 0;
            }
            
            .main-container {
                padding: 0 1rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }
            
            .footer-brand {
                margin-bottom: 1.5rem;
            }
            
            .footer-logo img {
                height: 50px;
            }
            
            .footer-description {
                font-size: 0.9rem;
            }
            
            .footer-section-title {
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            
            .footer-links {
                text-align: center;
            }
            
            .footer-contact {
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .social-link {
                width: 35px;
                height: 35px;
            }
            
            .btn-newsletter {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>
</body>
</html> 