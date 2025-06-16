            </div>
        </div>
    </div>

    <!-- Footer Admin -->
    <footer class="admin-footer mt-auto py-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small class="text-muted">
                        © <?= date('Y') ?> Murder Party - Administration
                        <span class="mx-2">•</span>
                        <span class="badge bg-success">v2.0</span>
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>
                        Dernière connexion : <?= date('d/m/Y à H:i') ?>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts personnalisés -->
    <script>
        // Animation des cartes au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observer toutes les cartes
        document.querySelectorAll('.card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Confirmation pour les actions dangereuses
        document.querySelectorAll('[data-confirm]').forEach(element => {
            element.addEventListener('click', function(e) {
                if (!confirm(this.getAttribute('data-confirm'))) {
                    e.preventDefault();
                }
            });
        });

        // Tooltips Bootstrap
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Auto-refresh des notifications
        setInterval(() => {
            // Ici on pourrait ajouter un appel AJAX pour mettre à jour les badges de notification
        }, 30000);
    </script>

    <style>
        .admin-footer {
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0,0,0,0.1);
            margin-top: 2rem;
        }
    </style>
</body>
</html> 