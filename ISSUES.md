Security issues fix or todo:

4/3/2023

Changes:

-uploaded website to github - enfored HTTPS

automatic with github pages!

(BACK UP POLICIES):

-Website files saved on OneDrive

I uploaded the websites folder (includes html, css, imgs, ect) to Onedrive. For extra layers of protection,
I uploaded the website to my person oneDrive and then my Eagles Email oneDrive. I have an authenticator for both,
so not just anyone will be able to have access to these files. 

-Website files saved physically on Hard Drive

I bought a 32 gb sanddisk flash drive from bestbuy yesterday. The website folder is now saved on it, zipped up, and password protected.
Even if someone gets their hands on the flash drive, it should be encrypted. 

(Interal Actor threats):

-Notifications when changes happen

(Cross Site Scripting): preventing a common cross site script attack

Made a js function for my loging:

Not yet in the website but works on my test site: 

will link script -

function preventcss() {
	var query = new URL(window.location).searchParams.get('query')
	document.getElementById('query-input').value = query
	document.getElementById('query-output').innerHTML = query
}

once I have the page ready, i will implament said js file


TODO:

-Add images - prority: ASAP; implamentation: easy;

-Add js function to stop Cross Site Scripting (already made): prority: ASAP; implamentation: moderate; (need to finish loggin page)

-get domain prority: Moderate; implamentation: easy;

-host on godaddy prority: Low; implamentation: moderate;

-create login prority: ASAP; implamentation: Difficult;

-test for bugs prority: ASAP; implamentation: moderate;

-prevent cross site scripting prority: ASAP; implamentation: difficult (find more vulnerabilites);

4/8/23
-add images 

-test for bugs

-finish login page
