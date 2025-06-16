    <footer class="footer-modern mt-auto">
        <div class="container">
            <!-- Contenu principal du footer -->
            <div class="row py-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-brand">
                        <h4 class="footer-title">
                            <i class="fas fa-mask text-accent me-2" aria-hidden="true"></i>
                            Murder Party
                        </h4>
                        <p class="footer-description">
                            Un événement mystérieux et immersif qui vous plongera dans une enquête palpitante. 
                            Découvrez qui est le coupable dans cette soirée inoubliable.
                        </p>
                        <div class="footer-social">
                            <a href="#" class="social-link" aria-label="Facebook" title="Suivez-nous sur Facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram" title="Suivez-nous sur Instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter" title="Suivez-nous sur Twitter">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-section-title">Navigation</h5>
                    <ul class="footer-links">
                        <li><a href="/" class="footer-link">
                            <i class="fas fa-home me-2" aria-hidden="true"></i>Accueil
                        </a></li>
                        <li><a href="/concept" class="footer-link">
                            <i class="fas fa-lightbulb me-2" aria-hidden="true"></i>Concept
                        </a></li>
                        <li><a href="/infos" class="footer-link">
                            <i class="fas fa-info-circle me-2" aria-hidden="true"></i>Infos pratiques
                        </a></li>
                        <?php if (isLoggedIn()): ?>
                        <li><a href="/profil" class="footer-link">
                            <i class="fas fa-user me-2" aria-hidden="true"></i>Mon profil
                        </a></li>
                        <li><a href="/messagerie" class="footer-link">
                            <i class="fas fa-envelope me-2" aria-hidden="true"></i>Messagerie
                        </a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-section-title">Contact</h5>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-envelope text-accent me-3" aria-hidden="true"></i>
                            <div>
                                <strong>Email</strong>
                                <br>
                                <a href="mailto:contact@murderparty.local" class="footer-link">
                                    contact@murderparty.local
                                </a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone text-accent me-3" aria-hidden="true"></i>
                            <div>
                                <strong>Téléphone</strong>
                                <br>
                                <a href="tel:0325000000" class="footer-link">
                                    03 25 XX XX XX
                                </a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt text-accent me-3" aria-hidden="true"></i>
                            <div>
                                <strong>Adresse</strong>
                                <br>
                                <span class="text-muted">Troyes, France</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-section-title">Informations</h5>
                    <ul class="footer-links">
                        <li><a href="/mentions" class="footer-link">
                            <i class="fas fa-gavel me-2" aria-hidden="true"></i>Mentions légales
                        </a></li>
                        <?php if (!isLoggedIn()): ?>
                        <li><a href="/auth/inscription" class="footer-link">
                            <i class="fas fa-user-plus me-2" aria-hidden="true"></i>S'inscrire
                        </a></li>
                        <li><a href="/auth/connexion" class="footer-link">
                            <i class="fas fa-sign-in-alt me-2" aria-hidden="true"></i>Se connecter
                        </a></li>
                        <?php endif; ?>
                        <?php if (isAdmin()): ?>
                        <li><a href="/admin" class="footer-link footer-link-admin">
                            <i class="fas fa-cog me-2" aria-hidden="true"></i>Administration
                        </a></li>
                        <?php endif; ?>
                    </ul>
                    
                    <div class="footer-badge mt-3">
                        <div class="badge-modern">
                            <i class="fas fa-award me-2" aria-hidden="true"></i>
                            <div>
                                <strong>SAE202</strong>
                                <br>
                                <small>Projet étudiant</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Séparateur -->
            <hr class="footer-divider">
            
            <!-- Copyright et informations légales -->
            <div class="row py-3">
                <div class="col-md-6">
                    <p class="footer-copyright mb-0">
                        © <?= date('Y') ?> Murder Party Events
                        <span class="mx-2">•</span>
                        <span class="badge badge-version">v2.0</span>
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="footer-credits mb-0">
                        <i class="fas fa-graduation-cap me-1 text-accent" aria-hidden="true"></i>
                        Développé par les étudiants MMI Troyes
                    </p>
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
        /* Styles du footer moderne */
        .footer-modern {
            background: var(--gradient-primary);
            color: var(--text-light);
            position: relative;
            overflow: hidden;
        }
        
        .footer-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="footerPattern" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23footerPattern)"/></svg>');
            pointer-events: none;
        }
        
        .footer-brand {
            position: relative;
            z-index: 1;
        }
        
        .footer-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--text-light);
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition-smooth);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-link:hover {
            background: var(--gradient-accent);
            color: var(--text-primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }
        
        .social-link:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        .footer-section-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 600;
            color: var(--accent-gold);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            position: relative;
        }
        
        .footer-section-title::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--gradient-accent);
            border-radius: 1px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            padding: 0.25rem 0;
            border-radius: 6px;
        }
        
        .footer-link:hover {
            color: var(--accent-gold);
            transform: translateX(5px);
            text-decoration: none;
        }
        
        .footer-link:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        .footer-link-admin {
            background: rgba(139, 0, 0, 0.2);
            padding: 0.5rem;
            border-radius: 8px;
            border: 1px solid rgba(139, 0, 0, 0.3);
        }
        
        .footer-link-admin:hover {
            background: var(--gradient-crimson);
            color: var(--text-light);
        }
        
        .footer-contact {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .contact-item i {
            margin-top: 0.25rem;
            font-size: 1.1rem;
        }
        
        .contact-item strong {
            color: var(--text-light);
            font-weight: 600;
        }
        
        .badge-modern {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition-smooth);
        }
        
        .badge-modern:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
        }
        
        .badge-modern i {
            color: var(--accent-gold);
            font-size: 1.2rem;
        }
        
        .footer-divider {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 0;
        }
        
        .footer-copyright {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }
        
        .footer-credits {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }
        
        .badge-version {
            background: var(--gradient-accent);
            color: var(--text-primary);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        /* Responsive footer */
        @media (max-width: 767.98px) {
            .footer-modern .container {
                padding: 0 1rem;
            }
            
            .footer-social {
                justify-content: center;
            }
            
            .footer-contact {
                text-align: center;
            }
            
            .contact-item {
                justify-content: center;
                text-align: left;
            }
            
            .col-md-6.text-md-end {
                text-align: center !important;
                margin-top: 1rem;
            }
        }
        
        /* Accessibilité - Navigation au clavier */
        .keyboard-navigation *:focus {
            outline: 3px solid var(--accent-gold) !important;
            outline-offset: 2px !important;
        }
    </style>
</body>
</html> 