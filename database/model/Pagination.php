<?php
include_once("Database.php");

class Pagination extends Database
{
    private $_limit;
    private $_current_page;
    private $_total_page;
    private $_result;

    public function getResult()
    {
        return $this->_result;
    }

    public function getTotalPage()
    {
        return $this->_total_page;
    }

    public function getLimit()
    {
        return $this->_limit;
    }

    public function getCurrentPage()
    {
        return $this->_current_page;
    }

    public function makePagination($_query, $limit = 10, $current_page = 1)
    {
        $rs = $this->conn->query($_query);
        $total_record = mysqli_num_rows($rs);

        $this->_limit = $limit;
        $this->_current_page = $current_page;

        $this->_total_page = ceil($total_record / $limit);

        if ($this->_current_page > $this->_total_page) {
            $this->_current_page = $this->_total_page;
        } else if ($current_page < 1) {
            $this->_current_page = 1;
        }

        $start = ($current_page - 1) * $limit;

        $query = $_query . " LIMIT $start, $limit";

        $rs = $this->conn->query($query);

        while ($row = $rs->fetch_assoc()) {
            $results[] = $row;
        }
        $this->_result = $results;
        $result = new Pagination();
        $result->_current_page = $this->_current_page;
        $result->_limit = $this->_limit;
        $result->_total_page = $this->_total_page;
        $result->_result = $this->_result;
        return $result;
    }


    public function showPagination()
    {
        $menu = $_GET["menu"];
        $html = "<nav aria-label='navigation'><ul class='pagination justify-content-center'>";
        if ($this->getCurrentPage() >= 1 && $this->getTotalPage() > 1) {
            if ($this->getCurrentPage() == 1) {
                $html .= '<li class="page-item disabled"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . ($this->getCurrentPage() - 1) . '"><span style="font-size: 1.45rem;">&laquo;</span></a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . ($this->getCurrentPage() - 1) . '"><span style="font-size: 1.45rem;">&laquo;</span></a></li>';
            }
        }
        for ($i = 1; $i <= $this->getTotalPage(); $i++) {
            if ($i == $this->getCurrentPage()) {
                $html .= '<li class="page-item active"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . $i . '">' . $i . '</a></li> ';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . $i . '">' . $i . '</a></li>';
            }
        }

        if ($this->getCurrentPage() <= $this->getTotalPage() && $this->getTotalPage() > 1) {
            if ($this->getCurrentPage() == $this->getTotalPage()) {
                $html .= '<li class="page-item disabled"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . ($this->getCurrentPage() + 1) . '"><span style="font-size: 1.45rem; ">&raquo;</span></a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="index.php?menu=' . $menu . '&page=' . ($this->getCurrentPage() + 1) . '"><span style="font-size: 1.45rem;">&raquo;</span></a></li>';
            }
        }
        $html .= "</ul></nav>";
        return $html;
    }
}

?>