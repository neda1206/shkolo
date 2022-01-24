#Customizable web dashboard
Setup environment
## Installation
* Clone the repository and move the root folder to the deployment folder of your browser. (for Apache, this is htdocs)
* Create a blank DB called *shkolo* in MySQL
*create tables
--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `button_id` int(11) NOT NULL,
  `button_name` text NOT NULL,
  `button_title` text NOT NULL,
  `button_link` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`button_id`, `button_name`, `button_title`, `button_link`, `color`) VALUES
(1, 'btn1', '', '', ''),
(2, 'btn2', '', '', ''),
(3, 'btn3', '', '', ''),
(4, 'btn4', '', '', ''),
(5, 'btn5', '', '', ''),
(6, 'btn6', '', '', ''),
(7, 'btn7', '', '', ''),
(8, 'btn8', '', '', ''),
(9, 'btn9', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_code` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_code`, `color`) VALUES
(1, ' #f00a19', 'red'),
(2, '#087314', 'green'),
(3, '#08428c', 'blue'),
(4, '#3c0485', 'purple'),
(5, '#db7a0b', 'orange');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`button_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

*navigate to project dir and start a web server
*open

http://localhost/shkolo/index.php
