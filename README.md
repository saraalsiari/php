### Metadata:

- Web Application
- Technology stack: [PHP, Javascript, XML, HTML, CSS and Boostrap].
- Hosted on Azure cloud and on a free hosting provider 000webhost (Firebase hosting not allows to serve PHP servers).
- We use XML to store configuration data because it is simple and easy to manage for simple data structure.

- Azure hosted at: https://complexity-tool.azurewebsites.net
- Freely hosted using a cpanel: https://measurecode.000webhostapp.com/
- Github repository: https://github.com/blasanka/code-measuring-tool/
- This readme available as markdown: https://github.com/Blasanka/code-measuring-tool/blob/master/README.md

### About the project:

This is our solution for the code measuring tool for 3rd year 2nd Semester ITPM module project. Which let
user to upload a .java, .cpp and .zip file type using html browser to measure the code complexity for
Size, Variable, Method, Control Structure, Inheritance and Coupling.

User can upload a file and and edit in html text area and press analyze button to see above factors in tbles. Also the app provides calculation of all factors at the bottom of the page.

User can also change the configuration of weight measures which was given in project specification.

As an added feature user can generate a pdf of the code measured factor table.

### Installation guideline:

- Install XAMPP or WAMP or a tool that provide php server.
- If XAMPP clone the repository to htdocs, if WAMP to the www folder.
- Clone the repository using `git clone https://github.com/blasanka/code-measuring-tool`.
- Can open the project using any IDE or Editor like VS Code, Atom or etc.
- Use a web browser to run the app using localhost: typically: `http://localhost/code-measuring-tool/index.php`.

### About the implementation

- For the function coupling, used regex to find and match spec.
- Used simple PDF generate using http://www.fpdf.org/?lang=en
- Weights are stored an read using XML files.
- Integration, source code and sharing handled using git with github.

### Sidenotes

- Coupling calculation could not complete because of the workload, time limitation and etc (power failures regulary).
- Generate PDF only done for Coupling
- All Factors measures table are not well managed and accuracy is low.
- Sometimes need page refresh when in deployed site.
