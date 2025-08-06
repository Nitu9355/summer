// Create a form element
const form = document.createElement('form');
form.method = 'get';
 
// First Name input
const firstNameLabel = document.createElement('label');
firstNameLabel.textContent = 'First Name: ';
const firstNameInput = document.createElement('input');
firstNameInput.type = 'text';
firstNameInput.name = 'first_name';
firstNameInput.required = true;
form.appendChild(firstNameLabel);
form.appendChild(firstNameInput);
form.appendChild(document.createElement('br'));
form.appendChild(document.createElement('br'));
 
// Last Name input
const lastNameLabel = document.createElement('label');
lastNameLabel.textContent = 'Last Name: ';
const lastNameInput = document.createElement('input');
lastNameInput.type = 'text';
lastNameInput.name = 'last_name';
lastNameInput.required = true;
form.appendChild(lastNameLabel);
form.appendChild(lastNameInput);
form.appendChild(document.createElement('br'));
form.appendChild(document.createElement('br'));
 
// Email input
const emailLabel = document.createElement('label');
emailLabel.textContent = 'Email: ';
const emailInput = document.createElement('input');
emailInput.type = 'email';
emailInput.name = 'email';
emailInput.required = true;
form.appendChild(emailLabel);
form.appendChild(emailInput);
form.appendChild(document.createElement('br'));
form.appendChild(document.createElement('br'));
 
// Radio buttons for regions of contact
const regionLabel = document.createElement('label');
regionLabel.textContent = 'Regions for Contact:';
form.appendChild(regionLabel);
form.appendChild(document.createElement('br'));
 
const regions = ['Project', 'Coffee', 'Jobs', 'Others'];
regions.forEach(region => {
    const radio = document.createElement('input');
    radio.type = 'radio';
    radio.name = 'region';
    radio.value = region.toLowerCase();
    radio.required = true;
    const label = document.createElement('label');
    label.textContent = region;
    form.appendChild(radio);
    form.appendChild(label);
    form.appendChild(document.createElement('br'));
});
 
// Consulting date input
const dateLabel = document.createElement('label');
dateLabel.textContent = 'Consulting Date: ';
const dateInput = document.createElement('input');
dateInput.type = 'date';
dateInput.name = 'consulting_date';
dateInput.required = true;
form.appendChild(dateLabel);
form.appendChild(dateInput);
form.appendChild(document.createElement('br'));
form.appendChild(document.createElement('br'));
 
// Submit button
const submitButton = document.createElement('input');
submitButton.type = 'submit';
submitButton.value = 'Register';
form.appendChild(submitButton);
 
// Append form to the body
document.body.appendChild(form);
 
 