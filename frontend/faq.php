<?php include './action/connection.php'; ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAQ - Himalayan Farm Fresh</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f4f9f4;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .faq-header {
      background: linear-gradient(135deg, #2c7a7b, #38a169);
      color: white;
      padding: 50px 20px;
      text-align: center;
      border-radius: 0 0 25px 25px;
    }
    .faq-header h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }
    .accordion-button:not(.collapsed) {
      background-color: #38a169;
      color: white;
    }
    .accordion-item {
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <!-- FAQ Header Section -->
  <div class="faq-header">
    <h1>❓ Frequently Asked Questions</h1>
    <p>Got questions about Himalayan Farm Fresh? We’ve got answers!</p>
  </div>

  <!-- FAQ Section -->
  <div class="container my-5">
    <div class="accordion" id="faqAccordion">
      
      <!-- Q1 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
            🌱 Where do your products come from?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            All our products are sourced directly from farmers in the pristine Himalayan region. We ensure they are organic, chemical-free, and fresh.
          </div>
        </div>
      </div>

      <!-- Q2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
            🚚 How long does delivery take?
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Orders are usually delivered within <strong>3-5 business days</strong>, depending on your location.
          </div>
        </div>
      </div>

      <!-- Q3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
            💳 What payment methods do you accept?
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We accept all major debit/credit cards, UPI, net banking, and Cash on Delivery (COD).
          </div>
        </div>
      </div>

      <!-- Q4 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
            🔄 What is your return policy?
          </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            If you're not satisfied, you can return unused products within <strong>7 days</strong> for a full refund or replacement.
          </div>
        </div>
      </div>

      <!-- Q5 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
            👨‍🌾 How can farmers join your platform?
          </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Farmers can register through our <a href="./signup_far.php">Farmer Registration</a> page. After verification, they can start selling products online.
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
