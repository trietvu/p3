#**DWA15 Project 3**

##Live URL: [P3 URL](http://p3.medsages.net)

This project is a Lorem Ipsum and Random User Generator. It gives the user options to
generate filler text or random user data for their project requirements.

The Lorem Ipsum Generator allows the user to input a numeric value between 1-99 to generate
the specified number of paragraphs of the filler text. The Random User Generator allows the user
to specify options such as the number of users, title, birthdate, address, phone number, and a
profile to generate random user data.

The link to the screencast demo for this project can be found at: https://youtu.be/J8VY-adsldA

Bother generators limit the number of items in the way of paragraphs or users to 99. The
application also checks the numeric fields to see if the inputted values are integers, if they
meeting the minimum and maximum requirements, and if the values are set.

Badcow/Lorem-ipsum package was used for the Lorem-ipsum generator and Fzaninotto/Faker package was used
for the random user generator. Both were reviewed on Packagist.org before being installed in Laravel by
composer. There were issues with creating the array in the controller but the problem was identified with
the help of my TA, Jennifer, members my section and classmates on Piazza. The issue was how I wrote
the array.  I left out some "[]" which broke my code. Doh!
