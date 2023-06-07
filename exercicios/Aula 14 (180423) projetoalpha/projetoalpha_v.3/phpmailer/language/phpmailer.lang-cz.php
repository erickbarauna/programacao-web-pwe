    if (!Page.IsValid) {
        return;
    }
    string userIDText = UserID.Text;
    string emailText = Email.Text;
    string notSet = (string)GetLocalResourceObject("NotSet");
    try {
        MembershipUser mu = (MembershipUser) CallWebAdminHelperMethod(true, "GetUser", new object[] {(string) UserID.Text, false /* isOnline */}, new Type[] {typeof(string),typeof(bool)});
        mu.Email = Email.Text;
        if (
            Description.Text != null && !Description.Text.Equals(notSet)) {
            mu.Comment = Description.Text;
        }

        mu.IsApproved = ActiveUser.Checked;

        string  typeFullName = "System.Web.Security.MembershipUser, " + typeof(HttpContext).Assembly.GetName().ToString();;
        Type tempType = Type.GetType(typeFullName);

        CallWebAdminHelperMethod(true, "UpdateUser", new object[] {(MembershipUser) mu}, new Type[] {tempType});
        UpdateRoleMembership(userIDText);
    }
    catch (Exception ex) {
        PlaceholderValidator.IsValid = false;
        PlaceholderValidator.ErrorMessage = ex.Message;
        return;
    }
    
    // Go to confirmation
    DialogMessage.Text = String.Format((string)GetLocalResourceObject("Successful"), userIDText);
    AddAnother.Visible = false;
    Master.SetDisplayUI(true);

    ResetUI();       
}
</script>

<asp:content runat="server" contentplaceholderid="buttons">
<asp:button ValidationGroup="none" text="Back" id="DoneButton" onclick="ReturnToPreviousPage" runat="server"/>
</asp:content