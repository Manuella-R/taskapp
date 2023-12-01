create database testingdb;
use testingdb;

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(1, 'Python Flask coding visual studio', '2021-02-03 16:00:00', '2021-02-04 03:00:00'),
(2, 'PHP coding Notepad++', '2021-02-08 03:17:15', '2021-02-10 04:00:00'),
(6, 'Basketball', '2021-02-05 00:00:00', '2021-02-05 14:30:00'),
(7, 'Birthday Party', '2021-02-12 00:00:00', '2021-02-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;