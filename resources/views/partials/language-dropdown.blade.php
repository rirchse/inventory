<!-- Language Dropdown Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const languageButton = document.getElementById('language-button');
        const languageMenu = document.getElementById('language-menu');
        const languageChevron = document.getElementById('language-chevron');
        let isOpen = false;
        
        // Toggle dropdown
        languageButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Language button clicked');
            toggleDropdown();
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!languageButton.contains(e.target) && !languageMenu.contains(e.target)) {
                closeDropdown();
            }
        });
        
        // Close dropdown on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDropdown();
            }
        });
        
        function toggleDropdown() {
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        }
        
                    function openDropdown() {
                isOpen = true;
                console.log('Opening dropdown, adding visible class');
                languageMenu.classList.add('visible');
                languageChevron.style.transform = 'rotate(180deg)';
            }
            
            function closeDropdown() {
                isOpen = false;
                console.log('Closing dropdown, removing visible class');
                languageMenu.classList.remove('visible');
                languageChevron.style.transform = 'rotate(0deg)';
            }
        
        // Add click event listeners to language options
        const languageOptions = languageMenu.querySelectorAll('a');
        languageOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                console.log('Language option clicked:', this.href);
                closeDropdown();
            });
        });
    });
</script>
