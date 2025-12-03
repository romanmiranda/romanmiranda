        </main>

        <footer class="mt-5 pt-4 text-center text-muted">
            <div class="contact-icons mb-3">
                <a href="https://www.linkedin.com/in/romanmirandame/" class="text-muted me-3" aria-label="LinkedIn"
                    target="_blank">
                    <i class="fab fa-linkedin-in fa-lg"></i>
                </a>
                <a href="https://github.com/romanmiranda" class="text-muted me-3" aria-label="Github" target="_blank">
                    <i class="fab fa-github fa-lg"></i>
                </a>
                <a href="#" id="contact-email" class="text-muted" aria-label="Email">
                    <i class="fas fa-envelope fa-lg"></i>
                </a>
            </div>
            <p>Fueled by tacos 🌮 and coffee ☕, straight from Mexico 🇲🇽.</p>
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            'use strict'

            const getStoredTheme = () => localStorage.getItem('theme')
            const setStoredTheme = theme => localStorage.setItem('theme', theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }
                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-bs-theme', 'dark')
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeToggle = document.querySelector('#theme-toggle')
                const lightIcon = document.querySelector('#theme-icon-light')
                const darkIcon = document.querySelector('#theme-icon-dark')

                if (theme === 'dark') {
                    darkIcon.classList.remove('d-none')
                    lightIcon.classList.add('d-none')
                } else {
                    darkIcon.classList.add('d-none')
                    lightIcon.classList.remove('d-none')
                }
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())

                document.querySelector('#theme-toggle').addEventListener('click', () => {
                    const currentTheme = getPreferredTheme()
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light'
                    setStoredTheme(newTheme)
                    setTheme(newTheme)
                    showActiveTheme(newTheme)
                })

                const emailLink = document.querySelector('#contact-email');
                emailLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    const user = 'romanalberto.m';
                    const domain = 'gmail.com';
                    window.location.href = `mailto:${user}@${domain}`;
                });
            })
        })()
    </script>
</body>

</html>