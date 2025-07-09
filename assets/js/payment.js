
$(document).ready(function() {
    // Add click animation to payment icons
    $('.payment-icon').click(function() {
        $(this).addClass('animate__animated animate__pulse');
        setTimeout(() => {
            $(this).removeClass('animate__animated animate__pulse');
        }, 1000);
    });
    
    // Enhanced form submission
    $('#paymentForm').on("submit",function(e) {
        $('#loadingOverlay').show();
        $('#proceedBtn').prop('disabled', true);
        
        // Add loading text
        $('#proceedBtn').html('<i class="fas fa-spinner fa-spin" style="margin-right: 10px;"></i>Processing...');
        
        // Simulate delay for better UX
        setTimeout(() => {
            // Form will submit naturally
        }, 1000);
    });
    
    // Delete confirmation (if needed)
    $("#delete").click(function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
            return false;
        }
        return true;
    });
    
    // Add hover effects to form elements
    $('input, button').focus(function() {
        $(this).parent().addClass('focused');
    }).blur(function() {
        $(this).parent().removeClass('focused');
    });
    
    // Smooth scroll for better UX
    $('html, body').animate({
        scrollTop: $('.payment-container').offset().top - 100
    }, 1000);
});

// Add particle effect on button hover
function createParticle(x, y) {
    const particle = document.createElement('div');
    particle.style.position = 'absolute';
    particle.style.width = '4px';
    particle.style.height = '4px';
    particle.style.backgroundColor = '#68d391';
    particle.style.borderRadius = '50%';
    particle.style.left = x + 'px';
    particle.style.top = y + 'px';
    particle.style.pointerEvents = 'none';
    particle.style.opacity = '0.7';
    document.body.appendChild(particle);
    
    // Animate particle
    const angle = Math.random() * Math.PI * 2;
    const velocity = Math.random() * 50 + 20;
    const vx = Math.cos(angle) * velocity;
    const vy = Math.sin(angle) * velocity;
    
    let posX = x;
    let posY = y;
    let opacity = 0.7;
    
    const animate = () => {
        posX += vx * 0.1;
        posY += vy * 0.1;
        opacity -= 0.02;
        
        particle.style.left = posX + 'px';
        particle.style.top = posY + 'px';
        particle.style.opacity = opacity;
        
        if (opacity > 0) {
            requestAnimationFrame(animate);
        } else {
            document.body.removeChild(particle);
        }
    };
    
    animate();
}

document.getElementById('proceedBtn').addEventListener('mouseenter', function(e) {
    const rect = this.getBoundingClientRect();
    for (let i = 0; i < 5; i++) {
        setTimeout(() => {
            createParticle(
                rect.left + Math.random() * rect.width,
                rect.top + Math.random() * rect.height
            );
        }, i * 100);
    }
});

