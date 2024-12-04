    <script>
      window.addEventListener('scroll', function () {
        var navbar = document.querySelector('nav');
        var offset = navbar.offsetTop;  // Get the current position of the navbar

        if (window.scrollY > offset) {
          navbar.style.position = 'fixed'; // Make the navbar fixed at the top
          navbar.style.top = '0'; // Keep it at the top of the page
        } else {
          navbar.style.position = 'absolute'; // Restore original position
          navbar.style.top = '40px'; // Make sure the navbar aligns correctly
        }
      });
    </script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/cart.js"></script>
    <script src="../js/owl.carousel.min.js"></script>

</body>
</html>
