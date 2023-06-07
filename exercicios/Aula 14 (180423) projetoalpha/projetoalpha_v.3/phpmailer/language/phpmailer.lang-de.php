k="SaveClick" text="<%$ Resources:Save %>" width="100"/>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </td>
        <td width="32%" height="100%">
            <table  borderwidth="1px" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                <tr class="callOutStyleLowLeftPadding" height="1">
                    <td valign="top">
                        <asp:literal runat="server" text="<%$ Resources:Roles %>" />
                    </td>
                </tr>
                <tr valign="top">
                    <td  class="userDetailsWithFontSize" height="100%">
                        <asp:panel runat="server" id="Panel1" scrollbars="auto" valign="top">
                        <asp:label runat="server" id="SelectRolesLabel" text="<%$ Resources:SelectRoles%>"/>
                        <br/>
                        <asp:repeater runat="server" id="CheckBoxRepeater">
                        <itemtemplate>
                        <asp:checkbox runat="server" id="checkBox1" text='<%# Container.DataItem.ToString()%>' checked='<%# (CurrentUser == null) ? false : (bool)CallWebAdminHelperMethod(false, "IsUserInRole", new object[] {(string) CurrentUser, (string) Container.DataItem.ToString()}, new Type[] {typeof(string),typeof(string)})%>'/>
                        <br/>
                        </itemtemplate>
                        </asp:repeater>
                        </asp:panel>
                    </td>
                </tr>
    </tbody>
            </table>
        </td>
  